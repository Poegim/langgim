<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\Redirector;

class Delete extends Component
{
    public $user;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): Redirector
    {

        $this->user->delete();
        session()->flash('flash.banner', 'User removed!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.users.index');

    }

    public function render()
    {
        return view('livewire.admin.users.delete');
    }
}
