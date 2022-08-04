<?php

namespace App\Http\Traits;

use App\Models\Word;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasWord
{
    public function word(): BelongsTo
    {
        return $this->belongsTo(Word::class, 'id');
    }
}
