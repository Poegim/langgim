<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Guest extends Component
{
    public $language;
    public $mode;
    private $allowedModes = ['typing', 'quiz'];

    public function mount($mode = null, $language = null)
    {
        if(in_array($mode, $this->allowedModes)) {
            $this->mode = $mode;
        } else {
            $this->mode = null;
        }

        if(in_array($language, config('langgim.allowed_languages'))) {
            $this->language = $language;
        } else {
            $this->language = null;
        }
    }

    public function setMode($mode){
        $this->mode = $mode;
    }

    public function render()
    {
        return view('livewire.guest');
    }
}
