<?php

namespace App\Http\Traits;

trait Result
{
    use UpdateUserData;

    public int $successCount = 0;
    public int $failureCount = 0;

    public function success($data)
    {
        $this->successCount++;
        if (auth()->check()) $this->updateUserData($data['class'], $data['word']['id'], true, $data['time']);
        $this->data = $data;
        $data['lesson_finished'] ? $this->finishLesson() : $this->finishWord();
    }

    public function failure($data)
    {
        $this->failureCount++;
        if (auth()->check()) $this->updateUserData($data['class'], $data['word']['id'], false, $data['time']);
        $this->data = $data;
        $this->modalFailureVisibility = true;
    }

}
