<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guest extends Controller
{
    public function index($language = null)
    {
        dd(env('APP_ENV') == 'local');

        return view('guest', [
            'language' => $language,
        ]);
    }
}
