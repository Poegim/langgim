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

    /**
     * Foreaching over categories/subcategories->words->userWords
     * and checking for already learned words of selected language
     */
    public function getProgress(Collection $categories, string $language, string $languageModel): Collection
    {
        foreach($categories as $category)
        {
            $category->learned_words = 0;
            $category->this_language_words = 0;

            foreach($category->words as $word)
            {
                switch ($language) {
                    case 'ukrainian':
                        $word->uaWord->word != '' ? $category->this_language_words++ : null;

                        break;
                    case 'english':
                        $word->enWord->word != '' ? $category->this_language_words++ : null;

                        break;
                    case 'german':
                        $word->geWord->word != '' ? $category->this_language_words++ : null;

                        break;
                    case 'spanish':
                        $word->esWord->word != '' ? $category->this_language_words++ : null;

                        break;
                }

                if(auth()->check())
                {
                    if(!$word->userWords->isEmpty())
                    {
                        foreach($word->userWords as $userWord)
                        {
                            if(($languageModel == $userWord->wordable_type) && ($userWord->is_learned >= 3))
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
                    switch ($language) {
                        case 'ukrainian':
                            $word->uaWord->word != '' ? $subcategory->this_language_words++ : null;

                            break;
                        case 'english':
                            $word->enWord->word != '' ? $subcategory->this_language_words++ : null;

                            break;
                        case 'german':
                            $word->geWord->word != '' ? $subcategory->this_language_words++ : null;

                            break;
                        case 'spanish':
                            $word->esWord->word != '' ? $subcategory->this_language_words++ : null;

                            break;
                    }

                    if(auth()->check())
                    {
                    if(!$word->userWords->isEmpty())
                        {
                            foreach($word->userWords as $userWord)
                            {
                                if(($languageModel == $userWord->wordable_type) && ($userWord->is_learned >= 3))
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
