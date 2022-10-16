<?php

namespace App\Http\Controllers;

use App\Http\Traits\ModelAdress;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    use ModelAdress;
    public $language;
    private $languageModel;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $categories = Category::with(['subcategories.words.userWords', 'words.userWords'])->get();

        $this->language = auth()->user()->language;
        $this->languageModel = $this->getModelAdress($this->language);

        return view('categories.index', [
            'categories' => $this->getProgress($categories),
            'language' => $this->language,
        ]);
    }

    /**
     * Foreaching over categories/subcategories->words->userWords
     * and checking for already learned words of selected language.
     */
    public function getProgress($categories)
    {
        foreach($categories as $category)
        {
            $category->learned_words = 0;

            foreach($category->words as $word)
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

            foreach($category->subcategories as $subcategory)
            {
                $subcategory->learned_words = 0;
                foreach($subcategory->words as $word)
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
