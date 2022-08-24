<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('categories.index', [
            'categories' => Category::with('subcategories')->get(),
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
