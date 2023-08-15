<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->withSubcategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');

        foreach(config('langgim.allowed_languages') as $language)
        {
            $category->{$language} = $request->{$language};
        }

        $category->save();

        session()->flash('flash.banner', 'Category added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->priority = $request->priority;

        foreach(config('langgim.allowed_languages') as $language)
        {
            $category->{$language} = $request->{$language};
        }

        $category->save();

        session()->flash('flash.banner', 'Category updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

}
