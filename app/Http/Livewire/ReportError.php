<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class ReportError extends Component
{
    public bool $modalVisibility = false;
    public ?Word $word;
    public ?int $wordId;
    public ?string $message;

    public function showModal():void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
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
