<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
<<<<<<< HEAD
})->name('home'); // ✅ Named 'home'

Route::get('/admin', function () {
=======
});
Route::get('/login', function () {
>>>>>>> 8d0a1999cd972eeb95ded1e90e32c8180b49726e
    return view('admin.dash');
})->name('admin'); // Optional: Named 'admin' if you need to link to it

Route::get('/blog', function () {
    return view('users.blog');
})->name('blog'); // ✅ Already named 'blog'

use Illuminate\Support\Str;

Route::get('/blog/{slug}', function ($slug) {
    return view('users.blog-detail', ['slug' => $slug]);
});


