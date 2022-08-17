<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guest extends Controller
{
    public array $allowedLanguages = ['ukrainian', 'english', 'german'];

    public function index($language = null)
    {
        return view('guest', [
            'language' => $language,
            'allowedLanguages' => $this->allowedLanguages,
        ]);
    }
}