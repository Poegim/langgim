<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Illuminate\View\View;

class Writing extends Component
{
    public ?string $message = null;
    public ?string $title = null;

    public $lastKey;
    public $words;
    public $word;
    public $previousWord;
    public $guessedChars = [];
    public $wordArray = [];
    public $language;
    public $foreignWord;
    public int $wordLength;
    public int $charNumber = 0;
    public int $wrongTry = 0;
    public const ALLOWED_TRIES = 3;

    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalReportErrorVisibility = false;

    protected $rules = [
        'title' => 'required|min:4',
        'message' => 'required|min:6',
    ];

    public function mount($language): void
    {
        $this->queryBuilder();
        $this->loadWord();
        $this->langauge = $language;
    }

    public function queryBuilder()
    {
        switch ($this->language) {
            case 'ukrainian':
                $withLanguage = 'uaWord';
                break;

            case 'english':
                $withLanguage = 'enWord';
                break;

            case 'german':
                $withLanguage = 'geWord';
                break;

            default:
                abort(403, 'Unknown error, contact administrator.');
                break;
        }

        $this->words = Word::with($withLanguage)
            ->whereRelation($withLanguage, 'word', '!=', '')
            ->get();

            // dd($this->words);

    }

    public function loadWord(): void
    {
        $this->resetVariables();
        $this->word = $this->words->random();
        $this->previousWord == null ? $this->previousWord = $this->word : null;
        $this->generateWordArrays();

        switch ($this->language) {
            case 'ukrainian':

                $this->foreignWord = $this->word->uaWord;
                break;

            case 'english':
                $this->foreignWord = $this->word->enWord;
                break;

            case 'german':
                $this->foreignWord = $this->word->geWord;
                break;
        }
    }

    public function resetVariables(): void
    {
        $this->charNumber = 0;
        $this->wrongTry = 0;
        $this->wordArray = [];
        $this->guessedChars = [];
        $this->lastKey = null;
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
    }

    public function generateWordArrays(): void
    {
        $this->wordLength = mb_strlen($this->word->pl_word, 'UTF-8');
        for ($i = 0; $i < $this->wordLength; $i++) {
            $this->wordArray[$i] = strtolower(mb_substr($this->word->pl_word, $i, 1, 'UTF-8'));
            $this->guessedChars[$i] = '_';
        }
    }

    public function keyPressed($key): void
    {
        $this->isKeyValid($key);
    }

    public function isKeyValid($key): void
    {
        $this->lastKey = $key;

        if (ord($this->wordArray[$this->charNumber]) == ord($this->lastKey))
        {
            $this->charNumber++;
            $this->guessedChars[$this->charNumber-1] = $this->lastKey;
            $this->dispatchBrowserEvent('validKey', ['charNumber' => $this->charNumber]);
            $this->charNumber == $this->wordLength ? $this->success() : null;

        } else
        {
            $this->wrongTry++;
            $this->dispatchBrowserEvent('invalidKey', ['charNumber' => ($this->charNumber+1)]);
            $this->wrongTry >= self::ALLOWED_TRIES ? $this->failure() : null;
        }

    }

    public function success(): void
    {
        $this->previousWord = $this->word;
        $this->loadWord();
        $this->modalSuccessVisibility = true;
    }

    public function failure(): void
    {
        $this->previousWord = $this->word;
        $this->loadWord();
        $this->modalFailureVisibility = true;
    }

    public function hideModals(): void
    {
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
        $this->modalReportErrorVisibility = false;
    }

    public function reportError(): void
    {
        $this->validate();

        $this->foreignWord->errors()->create([
            'user_id' => auth()->id(),
            'word_id' => $this->word->id,
            'title' => $this->title,
            'message' => $this->message,
        ]);

        $this->modalReportErrorVisibility = false;
        $this->message = null;
        $this->title = null;

    }

    public function render(): View
    {
        return view('livewire.writing');
    }
}
