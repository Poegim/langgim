<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function withUserWords(): Collection
    {
        return Category::with(['subcategories.words.userWords', 'words.userWords'])->orderBy('priority', 'desc')->get();
    }

    public function withoutUserWords(): Collection
    {
        return Category::with(['subcategories.words', 'words'])->orderBy('priority', 'desc')->get();
    }

    public function withSubcategories(): Collection
    {
        return Category::with('subcategories')->orderBy('priority', 'desc')->get();
    }

    /**
     * Foreaching over categories/subcategories->words->userWords
     * and checking for already learned words of selected language
     */
    public function getProgress(Collection $categories, string $language): Collection
    {

        foreach($categories as $category)
        {
            $category->learned_words = 0;
            $category->this_language_words = 0;

            foreach($category->words as $word)
            {
                //Iterate if word->{choosen language} isnt null;
                $word->{$language} && $category->this_language_words++;

                if(auth()->check())
                {
                    if(!$word->userWords->isEmpty())
                    {
                        foreach($word->userWords as $userWord)
                        {
                            if(($language == $userWord->language) && ($userWord->is_learned >= 3))
                            {
                                $category->learned_words++;
                            }
                        }
                    }
                }

            }

            foreach($category->subcategories as $subcategory)
            {
                $subcategory->learned_words = 0;
                $subcategory->this_language_words = 0;

                foreach($subcategory->words as $word)
                {
                    //Iterate if word->{choosen language} isnt null;
                    $word->{$language} && $subcategory->this_language_words++;

                    if(auth()->check())
                    {
                    if(!$word->userWords->isEmpty())
                        {
                            foreach($word->userWords as $userWord)
                            {
                                if(($language == $userWord->language) && ($userWord->is_learned >= 3))
                                {
                                    $subcategory->learned_words++;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $categories;
    }


}
