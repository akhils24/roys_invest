<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

// Homepage with gallery - THIS SHOULD USE index() method
Route::get('/', [GalleryController::class, 'index'])->name('home');

// Your existing routes...
Route::get('/dash', function () { return view('admin.dash'); })->name('admin-dashboard');
Route::get('/login', function () { return view('admin.dash'); })->name('admin');
Route::get('/blog', function () { return view('users.blog'); })->name('blog'); 
Route::get('/blog/{slug}', function ($slug) { return view('users.blog-detail', ['slug' => $slug]); });

// Your existing blog routes...
Route::get('/admin-blogs',[BlogController::class,'index'])->name('admin.blogs');
Route::get('/addblogs',[BlogController::class,'create'])->name('admin.addblogs');
Route::post('/addblogs',[BlogController::class,'store'])->name('admin.createblogs');
Route::get('editblogs',[BlogController::class,'edit'])->name('admin.editblogs');

// Gallery routes - Make sure these are correct
Route::prefix('admin')->group(function () {
    Route::get('/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
});