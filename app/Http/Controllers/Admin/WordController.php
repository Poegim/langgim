<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function index()
    {
        $words = Word::with('category')->get();
        return view('admin.words.index', compact('words'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Word $word)
    {
        //
    }

    public function edit(Word $word)
    {
        //
    }

    public function update(Request $request, Word $word)
    {
        //
    }

    public function destroy(Word $word)
    {
        //
    }

}
