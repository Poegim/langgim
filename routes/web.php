<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ControlPanel;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Landing Page
Route::get('/', function () {

    if(auth()->check())
    {
        return redirect()->route('dashboard');
    }

    return view('welcome');

});


//Dashboard
Route::middleware(['auth:sanctum', /*'verified'*/])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Guest mode
Route::get('/guest', function () {
    return view('dashboard');
})->name('guest');

//Control Panel
Route::get('control-panel', [ControlPanel::class, 'index'])->prefix('admin')->name('control-panel');

//Categories 
Route::resource('categories', CategoryController::class);

//Words
Route::resource('words', WordController::class);

//Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');