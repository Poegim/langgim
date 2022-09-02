<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\UserWord;

trait HasUserWords
{
    public function userWords(): MorphMany
    {
        return $this->morphMany(UserWord::class, 'wordable');
    }
}
