<?php

namespace App\Http\Livewire\Admin\Words;

use Livewire\Component;
use Livewire\Redirector;

class Delete extends Component
{
    public $word;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): Redirector
    {

        $this->word->delete();
        session()->flash('flash.banner', 'Word removed!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');

    }

    public function render()
    {
        return view('livewire.admin.words.delete');
    }
}
