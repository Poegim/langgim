<?php

namespace App\Http\Traits;

trait HasModals
{

    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalFinishLessonVisibility = false;

    public function finishWord()
    {
        $this->modalSuccessVisibility = true;
    }

    public function hideModals()
    {
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
        $this->dispatchBrowserEvent('init');
    }

    public function finishLesson()
    {
        $this->modalFinishLessonVisibility = true;
    }

}
