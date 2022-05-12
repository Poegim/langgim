<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;
use Illuminate\Support\Str;

class Writing extends Component
{
    public $lastKey;
    public $word;
    public $guessedChars = '';
    public $charNumber = 0;
    public $wordLength;

    public function boot()
    {
        $this->word = Word::inRandomOrder()->first();
        $this->wordLength = strlen($this->word->pl_word);
    }

    public function keyPressed($key)
    {
        $this->isKeyValid($key);
        $this->wordLength = strlen($this->word->pl_word);

    }

    public function isKeyValid($key)
    {
        $actualChar = substr($this->word->pl_word, $this->charNumber, 1);
        // $key = $this->removePolishSymbols($key);
       
        $this->lastKey = $key;

        
        if ($actualChar == $this->lastKey)
        {
            $this->charNumber++;
            $this->guessedChars = $this->guessedChars.$this->lastKey;
            $this->dispatchBrowserEvent('validKey', ['key' => $this->lastKey, 'charId' => $this->charNumber]);
        } else 
        {
            $this->wrongChar($actualChar, $this->lastKey);
        }       
    }

    public function wrongChar($ExpectedChar, $keyClicked)
    {
        dd("Actual char is:".$ExpectedChar." ".ord($ExpectedChar)." / Key clicked:".$keyClicked." ".ord($keyClicked));
        $this->dispatchBrowserEvent('invalidKey', ['key' => $this->lastKey, 'charId' => $this->charNumber]);
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

    public function render()
    {
        return view('livewire.writing');
    }
}
