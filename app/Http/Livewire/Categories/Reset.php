<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Reset extends Component
{
    public ?Category $category = null;
    public ?Subcategory $subcategory = null;
    public bool $modalVisibility = false;

    public function mount($category = NULL, $subcategory = NULL)
    {
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    public function showModal()
    {
        $this->modalVisibility = true;
    }

    public function resetProgress()
    {
        dd(' minecraft.net');
    }

    public function render()
    {
        return view('livewire.categories.reset');
    }
}
