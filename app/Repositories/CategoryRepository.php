<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function withUserWords(): Collection
    {
        return Category::with(['subcategories.words.userWords', 'words.userWords'])->get();
    }

    public function withoutUserWords(): Collection
    {
        return Category::with(['subcategories.words', 'words'])->get();
    }

    public function withSubcategories(): Collection
    {
        return Category::with('subcategories')->get();
    }
}
