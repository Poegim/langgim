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
        $this->word->errors()->create([
            'user_id' => 1,
            'word_id' => $this->word->id,
            'title' => rand(0,10000),
            'description' => rand(0,100000),
        ]);

        dd('done');

    }

    public function render()
    {
        return view('livewire.report-error');
    }
}
