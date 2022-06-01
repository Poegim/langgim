<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use Livewire\Redirector;

class Delete extends Component
{
    public $category;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): Redirector
    {

        $this->category->delete();
        session()->flash('flash.banner', 'Category removed!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

    public function render()
    {
        return view('livewire.admin.categories.delete');
    }
}
