<?php

namespace App\Http\Livewire\Admin\Words;

use App\Models\Word;
use Livewire\Component;

class LevelSelect extends Component
{
    public Word $word;
    public $level;
    public array $bg = ["bg-gray-400", "bg-gray-200", "bg-white"];


    public function mount(Word $word)
    {
        $this->word = $word;
        $this->level = $word->level;
    }

    public function saveOnChange()
    {
        $this->word->level = $this->level;
        $this->word->save();
        $this->emit('saved', $this->word->id);
    }

    public function render()
    {
        return view('livewire.admin.words.level-select');
    }
}
