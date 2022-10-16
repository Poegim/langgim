<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $validated = $request->validate([
                $language => 'unique:categories,'.$language.'|max:25|min:3|nullable'
            ]);
        }

        $category = new Category;
        $category->name = $request->name;

        foreach(config('langgim.allowed_languages') as $language)
        {
            $category->{$language} = $request->{$language};
        }

        $category->save();

        session()->flash('flash.banner', 'Category added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:25', 'min:3', Rule::unique('categories')->ignore($category->id, 'id')]
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $validated = $request->validate([
                $language => ['max:25', 'min:3', Rule::unique('categories', $language)->ignore($category->id, 'id'), 'nullable']
            ]);
        }


        $category->name = $request->name;

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
