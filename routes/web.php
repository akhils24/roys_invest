<?php


use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\GalleryController;

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

// Public gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Admin gallery
Route::get('/admin/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery');
Route::post('/admin/gallery/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
Route::delete('/admin/gallery/delete', [GalleryController::class, 'destroy'])->name('admin.gallery.delete');
