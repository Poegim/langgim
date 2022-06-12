<?php

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ControlPanel;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

})->name('welcome');


//Dashboard
Route::middleware(['auth:sanctum', /*'verified'*/])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Guest mode
Route::get('/guest', function () {
    return view('guest');
})->name('guest');

//Control Panel

//Admin
Route::name('admin.')->prefix('admin')->middleware(IsAdmin::class)->group(function () {
    Route::get('control-panel', [ControlPanel::class, 'index'])->name('control-panel');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('words', WordController::class);
    Route::get('users', function () {
        return view('dashboard');
    })->name('users.index');
});

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

