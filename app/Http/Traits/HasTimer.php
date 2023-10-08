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

    public function timeDiff(): int
    {
        return $this->stopTime - $this->startTime;
    }

    private function saveTime(User $user): void
    {
        $this->stopTimer();
        $this->summed += $this->timeDiff();


        if(auth()->check())
        {
            $this->user->timer = $this->user->timer + $this->summed;
            $this->user->save();
        }

        $this->startTime = 0;
        $this->stopTime = 0;

    }


}
