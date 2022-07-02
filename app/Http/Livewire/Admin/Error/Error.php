<?php

namespace App\Http\Livewire\Admin\Error;

use App\Models\Error as ErrorModel;
use Livewire\Component;

class Error extends Component
{
    public function render()
    {
        $errors = ErrorModel::all();
        return view('livewire.admin.error.error', [
            'errorsCollection' => $errors,
        ]);
    }
}
