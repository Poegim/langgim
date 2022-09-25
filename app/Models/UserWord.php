<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function wordable(): MorphTo
    {
        return $this->morphTo();
    }

    public function word()
    {
        return $this->belongsTo(Word::class, 'id');
    }
}
