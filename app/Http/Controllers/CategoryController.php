<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private string $language;
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('auth')->only('show');
        $this->repository = $repository;
    }

    public function index(string $mode): View
    {
        if(auth()->check())
        {
            $this->language = auth()->user()->language;

            if($mode == 'typing') {
                $categories = $this->repository->withUserWords();
            } elseif($mode == 'quiz') {
                $categories = $this->repository->withUserQuizWords();
            } else {
                abort(404);
            }
        } else
        {
            $categories = $this->repository->withoutUserWords();
            $this->language = collect(config('langgim.allowed_languages'))->random();
        }

        $categories = $this->repository->getProgress($mode, $categories, $this->language);

        return view('categories.index', [
            'mode' => $mode,
            'categories' => $categories,
            'language' => $this->language,
        ]);
    }

    public function show(string $mode, Category $category, Subcategory $subcategory = null)
    {
        return view('categories.show', [
            'mode' => $mode,
            'category' => $category,
            'subcategory' => $subcategory,
            'language' => auth()->user()->language,
        ]);
    }

}
