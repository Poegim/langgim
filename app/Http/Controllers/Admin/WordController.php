<?php

namespace App\Http\Controllers\Admin;

use App\Models\Word;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

        //Audio file managment
        $file = $request->file('audio_file');
        if($file != NULL)
        {
            $generatedName = hexdec(uniqid());
            $fileName = $generatedName . '.mp3';
            $uploadLocation = '../storage/app/public/audio/';
            $file->move($uploadLocation,$fileName);
            $newFilePath = '../storage/app/public/audio/'.$fileName;
        }


        //Saving data
        $word = new Word;
        $word->pl_word = $request->word;
        $word->sample_sentence = $request->sample_sentence;
        $word->category_id = $request->category[0];
        $request->file ? $word->audio_file = $newFilePath : null;

        //Check is subcategory choosed and assign value if yes.
        $request->category[1] != 0 ? $word->subcategory_id = $request->category[1] : $word->subcategory_id = null;

        $word->save();

        $word->uaWord()->insert([
            'id' => $word->id,
            'word' => $request->ua_word ? $request->ua_word : '',
        ]);

        //Redirect
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
        $categories = Category::with('subcategories')->get();
        return view('admin.words.edit', compact('categories', 'word'));
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
