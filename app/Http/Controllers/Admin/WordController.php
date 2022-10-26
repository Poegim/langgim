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
            'sample_sentecne' => ['nullable',],
            'category' => ['required',],
            'audio_file' => ['nullable','mimes:mp3','max:2048'],
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $request->validate([
                $language => 'max:30|nullable'
            ]);
        }

        //Split category input into category/subcategory array.
        $request->category = explode( '.', $request->category );

        //Audio file managment
        $file = $request->file('audio_file');
        if($file)
        {
            $generatedName = hexdec(uniqid());
            $fileName = $generatedName . '.mp3';
            $uploadLocation = 'audio/words/';
            $file->move($uploadLocation,$fileName);
            $newFilePath = 'audio/words/'.$fileName;
        }


        //Saving data
        $word = new Word;
        $word->pl_word = $request->word;
        $word->sample_sentence = $request->sample_sentence;
        $word->category_id = $request->category[0];
        $request->audio_file ? $word->audio_file = $newFilePath : null;

        //Check is subcategory choosed and assign value if yes.
        $request->category[1] != 0 ? $word->subcategory_id = $request->category[1] : $word->subcategory_id = null;

        $word->save();

        $word->uaWord()->create([
            'word' => $request->ukrainian ? $request->ukrainian : '',
        ]);

        $word->enWord()->create([
            'word' => $request->english ? $request->english : '',
        ]);

        $word->geWord()->create([
            'word' => $request->german ? $request->german : '',
        ]);

        $word->esWord()->create([
            'word' => $request->spanish ? $request->spanish : '',
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
        $request->validate([
            'word' => ['required',],
            'sample_sentecne' => ['nullable',],
            'category' => ['required',],
            'audio_file' => ['nullable','mimes:mp3','max:2048'],
        ]);

        foreach(config('langgim.allowed_languages') as $language)
        {
            $request->validate([
                $language => 'max:30|nullable'
            ]);
        }

        //Split category input into category/subcategory array.
        $request->category = explode( '.', $request->category );

        //Audio file managment
        $file = $request->file('audio_file');
        if($file)
        {
            $generatedName = hexdec(uniqid());
            $fileName = $generatedName . '.mp3';
            $uploadLocation = 'audio/words/';
            $file->move($uploadLocation,$fileName);
            $newFilePath = 'audio/words/'.$fileName;

            //Delete old audio file from disc
            file_exists($word->audio_file) ? unlink($word->audio_file) : null;

        }

        //Saving data
        $word->pl_word = $request->word;
        $word->sample_sentence = $request->sample_sentence;
        $word->category_id = $request->category[0];
        $request->audio_file ? $word->audio_file = $newFilePath : null;

        //Check is subcategory choosed and assign value if yes.
        $request->category[1] != 0 ? $word->subcategory_id = $request->category[1] : $word->subcategory_id = null;

        $word->save();

        $word->uaWord()->update([
            'word' => $request->ukrainian ? $request->ukrainian : '',
        ]);

        $word->enWord()->update([
            'word' => $request->english ? $request->english : '',
        ]);

        $word->geWord()->update([
            'word' => $request->german ? $request->german : '',
        ]);

        $word->esWord()->update([
            'word' => $request->spanish ? $request->spanish : '',
        ]);

        //Redirect
        session()->flash('flash.banner', 'Word updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');
    }

}
