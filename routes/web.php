<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
})->name('blog');

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
})->name('about');

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
})->name('contact');
