<?php

namespace App\Models;

use App\Models\Error;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\UserQuizWord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Word extends Model
{
    use HasFactory;

    public function userWords(): HasMany
    {
        return $this->hasMany(UserWord::class, 'word_id')->where('user_id', '=', auth()->id());
    }

    public function userQuizWords(): HasMany
    {
        return $this->hasMany(UserQuizWord::class, 'word_id')->where('user_id', '=', auth()->id());
    }

    public function errors(): HasMany
    {
        return $this->hasMany(Error::class, 'word_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function level(): string
    {
        return config('langgim.levels')[$this->level-1];
    }

}
