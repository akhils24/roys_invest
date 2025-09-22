<?php


use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('users.index');
})->name('home');

Route::get('/dash', function () {
    return view('admin.dash');
})->name('admin-dashboard');



Route::get('/login', function () {
    return view('admin.dash');
})->name('admin');

Route::get('/blog', function () {
    return view('users.blog');
})->name('blog'); 

Route::get('/blog/{slug}', function ($slug) {
    return view('users.blog-detail', ['slug' => $slug]);
});


// admin side management

Route::get('/admin-blogs',[BlogController::class,'index'])->name('admin.blogs');
Route::get('/addblogs',[BlogController::class,'create'])->name('admin.addblogs');
Route::post('/addblogs',[BlogController::class,'store'])->name('admin.createblogs');
Route::get('editblogs',[BlogController::class,'edit'])->name('admin.editblogs');
