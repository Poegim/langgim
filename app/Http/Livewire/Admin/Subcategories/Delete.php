<?php

namespace App\Http\Livewire\Admin\Subcategories;

use Livewire\Redirector;
use Livewire\Component;

class Delete extends Component
{
    public $subcategory;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): Redirector
    {

        $this->subcategory->delete();
        session()->flash('flash.banner', 'Subcategory removed!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');
        rollback

    }

    public function render()
    {
        return view('livewire.admin.subcategories.delete');
    }
}
