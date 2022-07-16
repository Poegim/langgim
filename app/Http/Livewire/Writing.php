<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class Writing extends Component
{
    public $language;
    public array $allowedLanguages = ['ukrainian', 'german', 'english'];
    public $category;
    public $subcategory;

    public $lastKey;
    public $words;
    public $word;
    public $foreignWord;
    public $previousWord;
    public $guessedChars = [];
    public $wordArray = [];
    public int $wordLength;
    public int $charNumber = 0;
    public int $wrongTry = 0;
    public const ALLOWED_TRIES = 3;

    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalLanguagePickVisibility = false;


    public function booted()
    {
        $this->words = Word::inRandomOrder()->get();
        $this->checkLanguagePick();

    }

    public function checkLanguagePick()
    {

        if (in_array($this->language, $this->allowedLanguages))
        {
            $this->loadWord();
        } else
        {
            $this->modalLanguagePickVisibility = true;
        }

    }

    public function loadWord()
    {
        if (in_array($this->language, $this->allowedLanguages))
        {
            $this->checkLanguagePick();
        } else
        {
            $this->resetVariables();
            $this->word = $this->words->random();
            $this->previousWord == null ? $this->previousWord = $this->word : null;
            $this->generateWordArrays();
        }
    }

    public function resetVariables()
    {
        $this->charNumber = 0;
        $this->wrongTry = 0;
        $this->wordArray = [];
        $this->guessedChars = [];
        $this->lastKey = null;
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
    }

    public function generateWordArrays()
    {
        $this->wordLength = mb_strlen($this->word->pl_word, 'UTF-8');
        for ($i = 0; $i < $this->wordLength; $i++) {
            $this->wordArray[$i] = strtolower(mb_substr($this->word->pl_word, $i, 1, 'UTF-8'));
            $this->guessedChars[$i] = '_';
        }
    }

    public function keyPressed($key)
    {
        $this->isKeyValid($key);
    }

    public function isKeyValid($key)
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

    public function success()
    {
        $this->previousWord = $this->word;
        $this->loadWord();
        $this->modalSuccessVisibility = true;
    }

    public function failure()
    {
        $this->previousWord = $this->word;
        $this->loadWord();
        $this->modalFailureVisibility = true;
    }

    public function hideModals()
    {
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
    }

    public function render()
    {
        return view('livewire.writing');
    }
}
