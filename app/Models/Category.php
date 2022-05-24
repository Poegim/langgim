<?php

namespace App\Models;

use App\Models\Word;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }

}
