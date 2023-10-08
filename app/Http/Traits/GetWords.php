<?php

namespace App\Http\Traits;

use App\Models\Word;
use Illuminate\Support\Collection;

trait GetWords
{
    public function getWords(): Collection
    {

        if(auth()->check())
        {
            if ($this->category != null) {

                if($this->subcategory != null)
                {
                    $words = Word::with('userWords')
                    ->where($this->language, '!=', NULL)
                    ->where('category_id', '=', $this->category->id)
                    ->where('subcategory_id', '=', $this->subcategory->id)
                    ->where('level', '<=', $this->user->level)
                    ->whereRelation('userWords', 'language', '=', $this->language)
                    ->whereRelation('userWords', 'is_learned', '<', $this->isLearned)
                    ->get();
                } else
                {
                    $words = Word::with('userWords')
                    ->where($this->language, '!=', NULL)
                    ->where('category_id', '=', $this->category->id)
                    ->where('level', '<=', $this->user->level)
                    ->whereRelation('userWords', 'language', '=', $this->language)
                    ->whereRelation('userWords', 'is_learned', '<', $this->isLearned)
                    ->get();
                }

            } else
            {
                $words = Word::where($this->language, '!=', NULL)
                    ->where('level', '<=', $this->user->level)
                    ->whereRelation('userWords', 'is_learned', '<', $this->isLearned)
                    ->inRandomOrder()
                    ->limit(100)
                    ->get();
            }

        } else
        {
            $words = Word::where($this->language, '!=', NULL)->inRandomOrder()->limit(100)->get();
        }

        return $words;

    }
}
