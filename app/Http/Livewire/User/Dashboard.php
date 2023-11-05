<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Dashboard extends Component
{
    public $category;
    public $subcategory;
    public $language;

    public function mount()
    {
        auth()->user()->category ? $this->category = Category::findOrFail(auth()->user()->category) : NULL;
        auth()->user()->subcategory ? $this->subcategory = Subcategory::findOrFail(auth()->user()->subcategory) : NULL;
        $this->language = auth()->user()->language;
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
