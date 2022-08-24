<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guest extends Controller
{
    public function index($language = null)
    {
        return view('guest', [
            'language' => $language,
        ]);
    }
}
