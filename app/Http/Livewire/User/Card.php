<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Card extends Component
{
    public $learnedWordsOnLevel;
    public $levelStatus;
    public string $class = '';

    public function mount()
    {
        $this->learnedWordsOnLevel = auth()->user()->learnedWordsOnLevel();
        $this->levelStatus = auth()->user()->levelStatus();
        $this->class = "w-".$this->levelStatus."p";
    }

    public function render()
    {
        return view('livewire.user.card');
    }
}
