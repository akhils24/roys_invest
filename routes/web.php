<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
})->name('home'); // ✅ Named 'home'

Route::get('/admin', function () {
    return view('admin.dash');
})->name('admin'); // Optional: Named 'admin' if you need to link to it

Route::get('/blog', function () {
    return view('users.blog');
})->name('blog'); // ✅ Already named 'blog'
