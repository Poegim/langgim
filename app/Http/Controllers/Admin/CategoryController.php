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

        $category = new Category;
        $category->name = $request->name;
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

        $category->name = $request->name;
        $category->save();

        session()->flash('flash.banner', 'Category updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

}
