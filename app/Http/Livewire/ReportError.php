<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class ReportError extends Component
{
    public bool $modalVisibility = false;
    public ?Word $word;
    public ?int $id;

    public function showModal(Word $word):void
    {
        //
    }

    public function reportError(): void
    {
        //
    }

    public function render()
    {
        return view('livewire.report-error');
    }
}
