<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Word;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Interfaces\ForeignWordInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

class Writing extends Component
{
    public ?string $message = null;
    public ?string $title = null;

    public ?string $lastKey = null;
    public ?Collection $words = null;
    public ?Word $word = null;
    public ?Word $previousWord = null;
    public array $guessedChars = [];
    public array $wordArray = [];

    public ?string $language;
    public ?Category $category = null;
    public ?Subcategory $subcategory = null;
    public ?ForeignWordInterface $foreignWord = null;
    public ?int $wordLength = null;
    public int $charNumber = 0;

    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalReportErrorVisibility = false;

    public int $wrongTry = 0;
    public const ALLOWED_TRIES = 3;

    /**
     * rules for reporting error validator
     */
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

    /**
     * queryBuilder gets words list with related child words of second languege
     */
    public function queryBuilder(): void
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

            case 'spanish':
                $withLanguage = 'esWord';
                break;

            default:
                abort(403, 'Unknown error, contact administrator.');
                break;
        }

        if ($this->category != null) {

            if($this->subcategory !=null)
            {
                $this
                ->words = Word::with($withLanguage)
                ->where('category_id', '=', $this->category->id)
                ->where('subcategory_id', '=', $this->subcategory->id)
                ->whereRelation($withLanguage, 'word', '!=', '')
                ->get();
            } else
            {
                $this
                ->words = Word::with($withLanguage)
                ->where('category_id', '=', $this->category->id)
                ->whereRelation($withLanguage, 'word', '!=', '')
                ->get();
            }

        } else
        {
            $this
            ->words = Word::with($withLanguage)
            ->whereRelation($withLanguage, 'word', '!=', '')
            ->get();
        }

    }

    /**
     * Loads single word
     */
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

            case 'spanish':
                $this->foreignWord = $this->word->esWord;
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

    /**
     * Genarates word array with subarrays, and guessed chars array.
     * In word array the word is split into single characters,
     * if the character is present only in the polish alphabet,
     * a key with an alternative latin alphabet character is added,
     * to avoid sittuation where a user who doesnt have a polish keyboard
     * is unable to guess the char
     *
     * example: letter 'ą' is represented by array of 'a' and 'ą',
     * so if expected char is 'ą' user can use just 'a'
     *
     * Guessed chars array keeps "_" chars as long as this char isnt guessed.
     */
    public function generateWordArrays(): void
    {
        $this->wordLength = mb_strlen($this->word->pl_word, 'UTF-8');

        for ($i = 0; $i < $this->wordLength; $i++) {
            $this->wordArray[$i] = [strtolower(mb_substr($this->word->pl_word, $i, 1, 'UTF-8'))];

            switch ($this->wordArray[$i][0] ) {
                case 'ą':
                    $this->wordArray[$i][1] = 'a';
                    break;
                case 'ć':
                    $this->wordArray[$i][1] = 'c';
                    break;
                case 'ę':
                    $this->wordArray[$i][1] = 'e';
                    break;
                case 'ł':
                    $this->wordArray[$i][1] = 'l';
                    break;
                case 'ń':
                    $this->wordArray[$i][1] = 'n';
                    break;
                case 'ó':
                    $this->wordArray[$i][1] = 'o';
                    break;
                case 'ś':
                    $this->wordArray[$i][1] = 's';
                    break;
                case 'ź':
                    $this->wordArray[$i][1] = 'z';
                    break;
                case 'ż':
                    $this->wordArray[$i][1] = 'z';
                    break;
            }

            $this->guessedChars[$i] = '_';
        }
    }

    public function keyPressed($key): void
    {
        $this->lastKey = $key;
        $this->isKeyValid();
    }

    /**
     * Checks is pressed key is an expected key.
     */
    public function isKeyValid(): void
    {

        if (in_array($this->lastKey, $this->wordArray[$this->charNumber]))
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

    /**
     * success is called when word has been guessed
     * shows success modal ale load next word
     */
    public function success(): void
    {
        $this->previousWord = $this->word;
        $this->loadWord();
        $this->modalSuccessVisibility = true;
    }

    /**
     * failure is called what user failed to guess word
     * shows modal failure and load next word
     */
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
