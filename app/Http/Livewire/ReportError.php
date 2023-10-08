<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class ReportError extends Component
{
    public ?string $message = null;
    public ?string $title = null;
    public ?string $language = null;
    public int $word_id = 0;
    public $modalReportErrorVisibility = false;
    public ?Word $word;

    protected $rules = [
        'title' => 'required|min:4',
        'message' => 'required|min:6',
    ];

    public function mount($word_id, string $language)
    {
        $this->word_id = $word_id;
        $this->language = $language;
    }

    public function reportError(): void
    {
        dd($this->word_id);
        $this->validate();
        $word = Word::findOrFail($this->word_id);
        $word->errors()->create([
            'user_id' => auth()->id(),
            'word_id' => $word->id,
            'title' => $this->title,
            'message' => $this->message,
            'language' => $this->language,
        ]);

        $this->modalReportErrorVisibility = false;
        $this->message = null;
        $this->title = null;

    }

    public function render()
    {
        return view('livewire.report-error');
    }
}
