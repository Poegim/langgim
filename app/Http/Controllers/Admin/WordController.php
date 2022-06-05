<?php

namespace App\Http\Controllers\Admin;

use App\Models\Word;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WordController extends Controller
{

    public function index()
    {
        $words = Word::with('category')->get();
        return view('admin.words.index', compact('words'));
    }

    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.words.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'word' => ['required',],
            'ua_word' => ['nullable',],
            'sample_sentecne' => ['nullable',],
            'category' => ['required',],
            'audio_file' => ['nullable','mimes:mp3','max:2048'],
        ]);

        //Split category input into category/subcategory array.
        $request->category = explode( '.', $request->category );

        $word = new Word;
        $word->pl_word = $request->word;
        $word->sample_sentence = $request->sample_sentecne;
        $word->category_id = $request->category[0];

        //Check is subcategory choosed and assign value if yes.
        $request->category[1] != 0 ? $word->subcategory_id = $request->category[1] : $word->subcategory_id = null;

        $word->save();

        session()->flash('flash.banner', 'Word added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');

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
