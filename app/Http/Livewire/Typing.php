<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserWord;
use Livewire\Component;
use App\Http\Traits\GetWords;
use App\Http\Traits\HasTimer;

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
            $this->saveLastUsedCategory();
        }

        $this->words = json_decode($this->getWords()->toJson());
    }

    public function success($data)
    {
        $this->successCount++;
        if (auth()->check()) $this->updateUserData($data['word']['id'], true, $data['time']);
        $this->data = $data;
        $data['lesson_finished'] ? $this->finishLesson() : $this->finishWord();
    }

    public function failure($data)
    {
        $this->failureCount++;
        if (auth()->check()) $this->updateUserData($data['word']['id'], false, $data['time']);
        $this->data = $data;
        $this->modalFailureVisibility = true;
    }

    /**
     * Updating user data.
     * Word id.
     * @param integer $id
     * Flag of success or failure.
     * @param boolean $flag
     * User timer.
     * @param integer $time
     */
    private function updateUserData(int $id, bool $flag, int $time)
    {
        $userWord = UserWord::firstOrCreate(
            [
                'word_id' => $id,
                'user_id' => auth()->user()->id,
                'language' => $this->language,
            ],
            [
                'word_id' => $id,
                'user_id' => auth()->user()->id,
                'language' => $this->language,
            ]
        );

        if($flag) {

            $userWord->is_learned++;
            $this->user->success_typing_count++;

        }

        if(!$flag) {

            $this->user->failure_typing_count++;

            if($userWord->is_learned > 0) {
                $userWord->is_learned--;
            }
        }

        $this->user->timer += $time;
        $this->user->save();
        $userWord->save();
    }

    private function finishWord()
    {
        $this->modalSuccessVisibility = true;
    }

    public function finishLesson()
    {
        $this->modalFinishLessonVisibility = true;
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
