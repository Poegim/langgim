<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class Writing extends Component
{
    public $lastKey;
    public $word;
    public $charNumer = 0;

    public function boot()
    {
        $this->word = Word::inRandomOrder()->first();
    }

    public function keyPressed($key)
    {
        $this->isKeyValid($key);
    }

    public function isKeyValid($key): bool
    {
        dd(substr($this->word->pl_word, 0, 1));

        $this->lastKey = $key;
    }

    public function render()
    {
        return view('livewire.writing');
    }
}
