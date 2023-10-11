<?php

namespace App\Http\Traits;

use App\Models\User;

trait HasTimer
{
    public int $startTime = 0;
    public int $stopTime = 0;
    public int $summed = 0;

    public function startTimer(): void
    {
        $this->startTime = microtime(true);
    }

    public function stopTimer(): void
    {
        $this->stopTime = microtime(true);
    }

    private function saveTime(User $user): void
    {
        $this->stopTimer();
        $this->summed = $this->stopTime - $this->startTime;

        if(auth()->check())
        {
            $user->timer = $this->user->timer + $this->summed;
            $user->save();
        }

    }


}
