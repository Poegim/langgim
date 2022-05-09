<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class Writing extends Component
{
    public $lastKey;
    public $word;
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

        if($actualChar == $key)
        {
            $this->lastKey = $key;
            $this->charNumber++;
        } else 
        {
            $this->wrongLetter();
        }       
    }

    public function wrongLetter()
    {
        return null;
    }

    public function render()
    {
        return view('livewire.writing');
    }
}
