<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Livewire\Component;
use App\Http\Traits\GetWords;
use App\Http\Traits\HasModals;
use App\Http\Traits\Result;

class Typing extends Component
{
    use GetWords;
    use Result;
    use HasModals;

    public int $isLearned = 5;

    public ?User $user;
    public ?Category $category;
    public ?Subcategory $subcategory;
    public ?string $language;
    public ?array $words;
    public bool $authCheck = false;
    public int $wordId = 0;
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

        if(auth()->check())
        {
            $this->saveLastUsedCategory();
        }

        $this->words = json_decode($this->getWords('userWords')->toJson());
    }

    public function saveLastUsedCategory()
    {
        if($this->category != NULL)
        {
            $this->user->category = $this->category->id;
            $this->user->subcategory = $this->subcategory ? $this->subcategory->id : null;
            $this->user->save();
        }
    }

    public function render()
    {
        return view('livewire.typing');
    }
}
