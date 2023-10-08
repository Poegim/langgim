<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserWord;
use App\Models\Word;
use Livewire\Component;
use App\Http\Traits\GetWords;

class Typing extends Component
{
    use GetWords;

    public int $isLearned = 5;
    public int $successCount = 0;
    public int $failureCount = 0;

    public ?User $user;
    public ?Category $category;
    public ?Subcategory $subcategory;
    public ?string $language;
    public ?array $words;
    public bool $authCheck = false;
    public int $wordId = 0;

    public array $data = [];

    //Modals
    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalFinishLessonVisibility = false;

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
            if($this->category != NULL)
            {
                $this->createUserWords();
            }

            $this->saveLastUsedCategory();
        }

        $this->words = json_decode($this->getWords()->toJson());
    }

    public function success($data)
    {
        $this->successCount++;
        if ((auth()->check()) && isset($data['word']['user_words'])) $this->updateUserData($data['word']['user_words'][0]['id'], true);
        $this->data = $data;
        $data['lesson_finished'] ? $this->finishLesson() : $this->finishWord();
    }

    public function failure($data)
    {
        $this->failureCount++;
        if ((auth()->check()) && isset($data['word']['user_words'])) $this->updateUserData($data['word']['user_words'][0]['id'], false);
        $this->data = $data;
        $this->modalFailureVisibility = true;
    }

    private function updateUserData(int $id, bool $flag)
    {
        $userWord = UserWord::findOrFail($id);

        if($flag) {
            $userWord->is_learned++;
            $userWord->save();

            $this->user->success_typing_count++;
            $this->user->save();
        }

        if(!$flag) {
            $this->user->failure_typing_count++;
            $this->user->save();
        }

        if((!$flag) && ($userWord->is_learned > 0)) {
            $userWord->is_learned--;
            $userWord->save();
        }

    }

    private function finishWord()
    {
        $this->modalSuccessVisibility = true;
    }

    public function finishLesson()
    {
        $this->modalFinishLessonVisibility = true;
    }

    /**
     * If user learning this category first time, we are creating user_words
     * to save learning progress.
     */
    public function createUserWords(): void
    {
        if($this->category != NULL)
        {
            $words = Word::where($this->language, '!=', NULL)
            ->where('category_id', '=', $this->category->id)
            ->get();

            //Creating UserWords
            foreach($words as $word)
            {
                auth()->user()->userWords()->updateOrCreate(
                    [
                        'user_id' => auth()->id(),
                        'word_id' => $word->id,
                        'language' => $this->language,
                        'wrong_try' => 0,
                    ],
                );
            }
        }
    }

    public function saveLastUsedCategory(): void
    {
        if($this->category != NULL)
        {
            $this->user->category = $this->category->id;
            $this->user->subcategory = $this->subcategory ? $this->subcategory->id : null;
            $this->user->save();
        }
    }

    public function hideModals()
    {
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
        $this->dispatchBrowserEvent('init');
    }

    public function render()
    {
        return view('livewire.typing');
    }
}
