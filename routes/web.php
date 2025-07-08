<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blog', function () {
        return view('blog', ['title' => 'Blog']);
    })->name('blog');

    Route::get('/about', function () {
        return view('about', ['title' => 'About']);
    })->name('about');

    Route::get('/contact', function () {
        return view('contact', ['title' => 'Contact']);
    })->name('contact');
});

require __DIR__ . '/auth.php';
