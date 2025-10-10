<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Route;

// ---------------------------
// User Routes
// ---------------------------

Route::get('/', [GalleryController::class, 'frontendGallery'])->name('home');

Route::get('/blog', function () {
    return view('users.blog');
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    return view('users.blog-detail', ['slug' => $slug]);
});

// UPDATED: Use controller method for gallery detailed page
Route::get('/gallery', [GalleryController::class, 'galleryDetailed'])->name('gallery.all');

// ---------------------------
// Admin Dashboard
// ---------------------------
Route::get('/dash', function () {
    return view('admin.dash');
})->name('admin-dashboard');

Route::get('/login', function () {
    return view('admin.dash');
})->name('admin');

// ---------------------------
// Blog Management
// ---------------------------
Route::get('/admin-blogs', [BlogController::class, 'index'])->name('admin.blogs');
Route::get('/addblogs', [BlogController::class, 'create'])->name('admin.addblogs');
Route::post('/addblogs', [BlogController::class, 'store'])->name('admin.createblogs');
Route::get('/editblogs', [BlogController::class, 'edit'])->name('admin.editblogs');

// ---------------------------
// Gallery Management
// ---------------------------
// Categories
Route::get('/admin/gallery/categories', [GalleryController::class, 'catGallery'])->name('admin.cat_gallery');
Route::get('/admin/gallery/categories/create', [GalleryController::class, 'addGalleryCategory'])->name('admin.add_gallery_category');
Route::post('/admin/gallery/categories/store', [GalleryController::class, 'storeCategory'])->name('admin.store_category');
Route::get('/admin/gallery/categories/{id}/toggle', [GalleryController::class, 'toggleCategory'])->name('admin.toggle_category');

// Category Edit/Update
Route::get('/admin/gallery/categories/{id}/edit', [GalleryController::class, 'editCategory'])->name('admin.gallery.categories.edit');
Route::post('/admin/gallery/categories/{id}/update', [GalleryController::class, 'updateCategory'])->name('admin.gallery.categories.update');

// Images
Route::get('/admin/gallery', [GalleryController::class, 'gallery'])->name('admin.gallery');
Route::get('/admin/gallery/create', [GalleryController::class, 'addGallery'])->name('admin.addgallery');
Route::post('/admin/gallery/store', [GalleryController::class, 'storeImage'])->name('admin.store_image');
Route::get('/admin/gallery/images/{id}/toggle', [GalleryController::class, 'toggleImage'])->name('admin.toggle_image');

// Image Edit/Update/Delete
Route::get('/admin/gallery/images/{id}/edit', [GalleryController::class, 'editImage'])->name('admin.gallery.images.edit');
Route::post('/admin/gallery/images/{id}/update', [GalleryController::class, 'updateImage'])->name('admin.gallery.images.update');
Route::get('/admin/gallery/images/{id}/delete', [GalleryController::class, 'deleteImage'])->name('admin.gallery.images.delete');