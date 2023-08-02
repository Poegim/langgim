<?php

namespace App\Http\Controllers;

use App\Http\Traits\ModelAdress;
use App\Models\Category;
use App\Models\Subcategory;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use ModelAdress;
    private string $language;
    private string $languageModel = '';
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

        $categories = $this->repository->getProgress($categories, $this->language, $this->languageModel);

        return view('categories.index', [
            'categories' => $categories,
            'language' => $this->language,
        ]);
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
