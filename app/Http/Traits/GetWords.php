<?php

namespace App\Http\Traits;

use App\Models\Word;
use Illuminate\Support\Collection;

trait GetWords
{
    public function getWords(string $withRelation): Collection
    {

        if(auth()->check())
        {
            if ($this->category != null) {

                if($this->subcategory != null)
                {
                    $words = Word::with($withRelation)
                    ->where($this->language, '!=', NULL)
                    ->where('category_id', '=', $this->category->id)
                    ->where('subcategory_id', '=', $this->subcategory->id)
                    ->where('level', '<=', $this->user->level)
                    ->get();
                } else
                {
                    $words = Word::with($withRelation)
                    ->where($this->language, '!=', NULL)
                    ->where('category_id', '=', $this->category->id)
                    ->where('level', '<=', $this->user->level)
                    ->get();
                }

            } else
            {
                $words = Word::where($this->language, '!=', NULL)
                    ->where('level', '<=', $this->user->level)
                    ->inRandomOrder()
                    ->limit(100)
                    ->get();
            }

        } else
        {
            $words = Word::where($this->language, '!=', NULL)
                        ->where('level', 1)
                        ->inRandomOrder()
                        ->limit(100)
                        ->get();
        }

        return $words;

    }
}
