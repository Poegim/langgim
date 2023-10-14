<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function word()
    {
        return $this->belongsTo(Word::class, 'word_id');
    }
}
