<?php

namespace App\Http\Controllers;

use App\Http\Traits\ModelAdress;
use App\Models\Category;
use App\Models\Subcategory;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use ModelAdress;
    private string $language;
    private string $languageModel;
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('auth')->only('show');
        $this->repository = $repository;
    }

    public function index(): View
    {
        if(auth()->check())
        {
            $categories = $this->repository->withUserWords();
            $this->language = auth()->user()->language;
            $this->languageModel = $this->getModelAdress($this->language);
        } else
        {
            $categories = $this->repository->withoutUserWords();
            $this->language = collect(config('langgim.allowed_languages'))->random();
        }

        $categories = $this->getProgress($categories);

        return view('categories.index', [
            'categories' => $categories,
            'language' => $this->language,
        ]);
    }

    /**
     * Foreaching over categories/subcategories->words->userWords
     * and checking for already learned words of selected language
     */
    public function getProgress($categories): Collection
    {
        foreach($categories as $category)
        {
            $category->learned_words = 0;
            $category->this_language_words = 0;

            foreach($category->words as $word)
            {
                switch ($this->language) {
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
                            if(($this->languageModel == $userWord->wordable_type) && ($userWord->is_learned >= 3))
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
                    switch ($this->language) {
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
                                if(($this->languageModel == $userWord->wordable_type) && ($userWord->is_learned >= 3))
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

    public function show(Category $category, Subcategory $subcategory = null)
    {
        return view('categories.show', [
            'category' => $category,
            'subcategory' => $subcategory,
            'language' => auth()->user()->language,
        ]);
    }

}
