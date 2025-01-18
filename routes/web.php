<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChainController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\CheckPermissions;
use App\Http\Middleware\IncrementPostViews;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Main Page
Route::get('/', [MainController::class, 'index'])->name('main');

// Post Pages
Route::get('/post/{slug}', [PostController::class, 'show'])
    ->middleware(IncrementPostViews::class)
    ->name('post.show');

// Chain Pages
Route::get('/chain/{slug}', [ChainController::class, 'show'])->name('chain.show');

// Tag Pages
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');

// Category Pages
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/google/redirect', [GoogleAuthController::class, 'redirectToProvider'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'handleCallback'])->name('google.callback');

Route::middleware([CheckPermissions::class . ':4'])->group(function () {
    Route::get('/dashboard', function () {
        return 'You are logged in!';
    })->name('dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
