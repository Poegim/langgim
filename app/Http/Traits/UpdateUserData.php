<?php

namespace App\Http\Traits;

trait UpdateUserData {

    /**
    * Updating user data.
    * Class name
    * @param string $class
    * Word id.
    * @param integer $id
    * Flag of success or failure.
    * @param boolean $flag
    * User timer.
    * @param integer $time
    */
    private function updateUserData(string $class, int $id, bool $flag, int $time)
    {
        $className = "App\\Models\\".$class;
        // dd($className);

        if($class === 'UserWord') {
            $successIterationColumn = 'success_typing_count';
            $failureIterationColumn = 'failure_typing_count';
        } elseif ($class === 'UserQuizWord') {
            $successIterationColumn = 'success_quiz_count';
            $failureIterationColumn = 'failure_quiz_count';
        } else {
            abort(403, 'Unknown Error');
        }


        $userWord = $className::firstOrCreate(
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
            $this->user->{$successIterationColumn}++;
        }

        if(!$flag) {
            $this->user->{$failureIterationColumn}++;
            $userWord->wrong_try++;
            if($userWord->is_learned > 0) $userWord->is_learned--;
        }

        $this->user->timer += $time;
        $this->user->save();
        $userWord->save();
    }
}
