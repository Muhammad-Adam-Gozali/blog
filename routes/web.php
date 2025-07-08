<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

    Route::get('posts', function () {
        $posts = [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Adam',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora vitae aut, quos quia reiciendis sint enim excepturi distinctio vero officiis rerum voluptas ea maxime id eos recusandae nobis cum consequatur?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Adam',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora vitae aut, quos quia reiciendis sint enim excepturi distinctio vero officiis rerum voluptas ea maxime id eos recusandae nobis cum consequatur?'
            ],

        ];
        return view('posts', ['title' => 'Blog', 'posts' => $posts]);
    })->name('posts');

    Route::get('posts/{slug}', function ($slug) {
        $posts = [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Adam',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora vitae aut, quos quia reiciendis sint enim excepturi distinctio vero officiis rerum voluptas ea maxime id eos recusandae nobis cum consequatur?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Adam',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora vitae aut, quos quia reiciendis sint enim excepturi distinctio vero officiis rerum voluptas ea maxime id eos recusandae nobis cum consequatur?'
            ],
        ];

        $post = Arr::first($posts, function ($post) use ($slug) {
            return $post['slug'] == $slug;
        });
        
        if (!$post) {
            abort(404);
        }

        return view('post', ['title' => 'Single Post','post' => $post]);
    });

    Route::get('/about', function () {
        return view('about', ['title' => 'About']);
    })->name('about');

    Route::get('/contact', function () {
        return view('contact', ['title' => 'Contact']);
    })->name('contact');
});

require __DIR__ . '/auth.php';
