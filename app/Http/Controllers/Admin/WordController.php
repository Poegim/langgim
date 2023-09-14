<?php

namespace App\Http\Controllers\Admin;

use App\Models\Word;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWordRequest;
use App\Http\Requests\Admin\StoreFromJSONRequest;
use App\Http\Requests\Admin\UpdateWordRequest;
use App\Repositories\WordRepository;

class WordController extends Controller
{
    private WordRepository $repository;

    public function __construct(WordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $words =
            Word::with('category')
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('admin.words.index', compact('words'));
    }

    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.words.create', compact('categories'));
    }

    public function createFromJSON()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.words.create-from-json', compact('categories'));
    }

    public function store(StoreWordRequest $request)
    {
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
        $word->polish = $request->word;
        foreach( config('langgim.allowed_languages') as $language)
        {
            $request->{$language} =! NULL ? $word->{$language} = $request->{$language} : null;
        }

        $word->sample_sentence = $request->sample_sentence;
        $word->category_id = $request->category[0];
        $word->subcategory_id = $request->category[1];
        $request->audio_file ? $word->audio_file = $newFilePath : null;

        //Check is subcategory choosed and assign value if yes.
        // IS THIS NEEDED? IT HAS BEEN ASSOCIATED EARLIER?!
        $request->category[1] != 0 ? $word->subcategory_id = $request->category[1] : $word->subcategory_id = null;

        $word->save();

        //Redirect
        session()->flash('flash.banner', 'Word added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');

    }

    public function storeFromJSON(StoreFromJSONRequest $request)
    {
        //Split category input into category/subcategory array.
        $request->category = explode( '.', $request->category );
        $arrayOfWords = $this->repository->convertToArray($request->content);

        if(array_key_exists('errors', $arrayOfWords))
        {
            return redirect()->route('admin.create-from-json')->withErrors([$arrayOfWords['errors'][0]]);
        } else {
            foreach($arrayOfWords as $word)
            {
                $newWord = new Word;
                $word['polish'] ? $newWord['polish'] = $word['polish'] : null;
                foreach(config('langgim.allowed_languages') as $language)
                {
                    array_key_exists($language, $word) ? $newWord->{$language} = $word[$language] : null;
                }
                array_key_exists('sample_sentence', $word) ? $newWord->sample_sentence = $word['sample_sentence'] : null;
                $newWord->category_id = $request->category[0];
                $newWord->subcategory_id = $request->category[1];
                $newWord->save();
            }
        }
        session()->flash('flash.banner', 'Words added!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.create-from-json');


    }

    public function edit(Word $word)
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.words.edit', compact('categories', 'word'));
    }

    public function update(UpdateWordRequest $request, Word $word)
    {

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
        $word->polish = $request->word;

        foreach( config('langgim.allowed_languages') as $language)
        {
            $request->{$language} =! NULL ? $word->{$language} = $request->{$language} : null;
        }

        $word->sample_sentence = $request->sample_sentence;
        $word->category_id = $request->category[0];
        $word->subcategory_id = $request->category[1];
        $request->audio_file ? $word->audio_file = $newFilePath : null;

        $word->save();

        //Redirect
        session()->flash('flash.banner', 'Word updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('admin.words.index');
    }

}
