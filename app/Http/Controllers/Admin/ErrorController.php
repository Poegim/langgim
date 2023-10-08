<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreErrorRequest;
use App\Models\Error;

class ErrorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($word_id, $language)
    {
        return view('errors.create', compact('word_id', 'language'));
    }

    public function store(StoreErrorRequest $request)
    {
        $error = new Error;
        $error->word_id = $request->word_id;
        $error->language = $request->language;
        $error->title = $request->title;
        $error->message = $request->message;
        $error->user_id = auth()->user()->id;
        $error->save();

        return view('errors.saved');
    }

    public function index()
    {
        return view('admin.errors.index');
    }
}
