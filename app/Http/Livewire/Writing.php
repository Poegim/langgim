<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Illuminate\Support\Str;
use Arr;

class Writing extends Component
{
    public $lastKey;
    public $word;
    public $words;
    public $guessedChars = [];
    public $wordArray = [];
    public int $wordLength;
    public int $charNumber = 0;
    public int $wrongTry = 0;

    public function boot()
    {
        $this->words = Word::inRandomOrder()->get();
        $this->loadWord();
    }

    public function loadWord()
    {
        $this->resetVariables();
        $this->word = $this->words->random();
        $this->generateWordArrays();
    }

    public function resetVariables()
    {
        $this->charNumber = 0;
        $this->wrongTry = 0;
        $this->wordArray = [];
        $this->guessedChars = [];
        $this->lastKey = null;
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
            $this->wrongTry >= 3 ? $this->failure() : null;
        }
    }

    public function removePolishSymbols($key)
    {
        $polishSymbols = ['ą', 'ć',  'ę', 'ł', 'ó', 'ś', 'ż', 'ź'];

        if (in_array($key, $polishSymbols)) {
            switch ($key) {
                case "ą":
                    return "a";
                    break;
                case "ć":
                    return "c";
                    break;
                case "ę":
                    return "e";
                    break;
                case "ł":
                    return "l";
                    break;
                case "ó":
                    return "o";
                    break;

                case "ś":
                    return "s";
                    break;
                case "ź":
                    return "z";
                    break;
                case "ż":
                    return "z";
                    break;
            }
        }

        return $key;

    }

    public function success()
    {
        $this->dispatchBrowserEvent('successWord');
        $this->loadWord();
    }

    public function failure()
    {
        $this->dispatchBrowserEvent('failureWord');
        $this->loadWord();
    }

    public function render()
    {
        return view('livewire.writing');
    }
}
