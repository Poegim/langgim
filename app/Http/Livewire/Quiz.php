<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Traits\GetWords;
use App\Http\Traits\HasModals;
use App\Http\Traits\Result;

class Quiz extends Component
{
    use GetWords;
    use Result;
    use HasModals;

    public int $isLearned = 5;

    public bool $authCheck = false;
    public ?Category $category;
    public ?Subcategory $subcategory;
    public ?string $language;
    public ?array $words;
    public ?User $user;

    public array $data = [];

    public function mount($language, $category = NULL, $subcategory = NULL)
    {
        $this->data = [
            'word' => [
                'polish' => '',
                'sample_sentence' => '',
            ],
        ];

        foreach(config('langgim.allowed_languages') as $lng) {
            $this->data['word'][$lng] = '';
        }

        $this->authCheck = auth()->check();
        $this->user = auth()->check() ? User::findOrFail(auth()->user()->id) : null;
        $this->language = $language;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->words = json_decode($this->getWords('userQuizWords')->toJson());
    }

    public function render()
    {
        return view('livewire.quiz');
    }
}
