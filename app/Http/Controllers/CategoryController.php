<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $language;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $categories = Category::with(['subcategories.words.userWords', 'words.userWords'])->get();
        $language = auth()->user()->language;

        return view('categories.index', [
            'categories' => $this->getProgress($categories),
            'language' => $language,
        ]);
    }

    /**
     * Foreaching over categories/subcategories->words and checking for already learned words.
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
                    $word->userWords[0]->is_learned >= 3 ? $category->learned_words++ : null;
                }
            }

            foreach($category->subcategories as $subcategory)
            {
                $subcategory->learned_words = 0;
                foreach($subcategory->words as $word)
                {
                    if(!$word->userWords->isEmpty())
                    {
                        $word->userWords[0]->is_learned >= 3 ? $subcategory->learned_words++ : null;
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
