<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubcategoryRequest;
use App\Http\Requests\Admin\UpdateSubcategoryRequest;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(StoreSubcategoryRequest $request): RedirectResponse
    {
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name, '-');

        foreach(config('langgim.allowed_languages') as $language)
        {
            $subcategory->{$language} = $request->{$language};
        }

        $subcategory->category_id = $request->category;
        $subcategory->save();

        session()->flash('flash.banner', 'Subcategory added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

    public function edit(Subcategory $subcategory): View
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory): RedirectResponse
    {
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name, '-');

        foreach(config('langgim.allowed_languages') as $language)
        {
            $subcategory->{$language} = $request->{$language};
        }

        $subcategory->category_id = $request->category;
        $subcategory->save();

        session()->flash('flash.banner', 'Subcategory updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }
}
