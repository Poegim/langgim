<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public $category;
    public $subcategory;

    public function mount()
    {
        $this->category = auth()->user()->category;
        $this->subcategory = auth()->user()->subcategory;
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
