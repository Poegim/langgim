<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            'name' => 'required|max:25|min:3',
            'category' => 'required|exists:categories,id',
        ]);

        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();

        session()->flash('flash.banner', 'Subcategory added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }

    public function show(Subcategory $subcategory)
    {
        //
    }

    public function edit(Subcategory $subcategory): View
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:25|min:3',
            'category' => 'required|exists:categories,id',
        ]);

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();

        session()->flash('flash.banner', 'Subcategory updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.categories.index');

    }
}
