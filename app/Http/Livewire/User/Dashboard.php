<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Dashboard extends Component
{
    public $category;
    public $subcategory;

    public $quizCategory;
    public $quizSubcategory;

    public $language;

    public function mount()
    {
        auth()->user()->category ? $this->category = Category::findOrFail(auth()->user()->category) : NULL;
        auth()->user()->subcategory ? $this->subcategory = Subcategory::findOrFail(auth()->user()->subcategory) : NULL;

        auth()->user()->last_category_quiz ? $this->quizCategory = Category::findOrFail(auth()->user()->last_category_quiz) : NULL;
        auth()->user()->last_subcategory_quiz ? $this->quizSubcategory = Subcategory::findOrFail(auth()->user()->last_subcategory_quiz) : NULL;

        $this->language = auth()->user()->language;
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
