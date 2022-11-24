<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:75|min:3',
            'category' => 'required|exists:categories,id',
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $validated = $request->validate([
                $language => 'unique:subcategories,'.$language.'|max:75|min:3|nullable'
            ]);
        }

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

    public function update(Request $request, Subcategory $subcategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:75|min:3',
            'category' => 'required|exists:categories,id',
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $validated = $request->validate([
                $language => ['max:75', 'min:3', Rule::unique('subcategories', $language)->ignore($subcategory->id, 'id'), 'nullable']
            ]);
        }

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
