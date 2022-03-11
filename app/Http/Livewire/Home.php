<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $lastKey;

    public function keyPressed($key)
    {
        $this->lastKey = $key;
    }

    public function render()
    {
        return view('livewire.home');
    }
}
