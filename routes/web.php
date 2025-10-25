<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatgalleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubserviceController;
use App\Http\Controllers\GalleryController;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('index');

// admin side management
// blogs
Route::get('/admin-blogs',[BlogController::class,'index'])->name('admin.blogs');
Route::get('/addblogs',[BlogController::class,'create'])->name('admin.addblogs');
Route::post('/addblogs',[BlogController::class,'store'])->name('admin.createblogs');
Route::get('/editblogs/{id}/edit',[BlogController::class,'edit'])->name('admin.editblogs');
Route::post('/editblogs/{id}/edit',[BlogController::class,'update'])->name('admin.updateblogs');
Route::get('/statusblogs/{id}/update',[BlogController::class,'destroy'])->name('admin.statusblogs');

// services
Route::get('/admin-services',[ServiceController::class,'index'])->name('admin.services');
Route::get('/addservices',[ServiceController::class,'create'])->name('admin.addservices');
Route::post('/addservices',[ServiceController::class,'store'])->name('admin.createservices');
Route::get('/editservices/{id}/edit',[ServiceController::class,'edit'])->name('admin.editservices');
Route::post('/editservices/{id}/edit',[ServiceController::class,'update'])->name('admin.updateservices');
Route::get('/statusservices/{id}/update',[ServiceController::class,'destroy'])->name('admin.statusservices');

// subservices
Route::get('/admin-subservices',[SubserviceController::class,'index'])->name('admin.subservices');
Route::get('/addsubservices',[SubserviceController::class,'create'])->name('admin.addsubservices');
Route::post('/addsubservices',[SubserviceController::class,'store'])->name('admin.createsubservices');
Route::get('/editsubservices/{id}/edit',[SubserviceController::class,'edit'])->name('admin.editsubservices');
Route::post('/editsubservices/{id}/edit',[SubserviceController::class,'update'])->name('admin.updatesubservices');
Route::get('/statusubservices/{id}/update',[SubserviceController::class,'destroy'])->name('admin.statussubservices');

// gallery category
Route::get('/admin-catgallery',[CatgalleryController::class,'index'])->name('admin.catgallery');
Route::get('/addcatgallery',[CatgalleryController::class,'create'])->name('admin.addcatgallery');
Route::post('/addcatgallery',[CatgalleryController::class,'store'])->name('admin.createcatgallery');
Route::get('/editcatgallery/{id}/edit',[CatgalleryController::class,'edit'])->name('admin.editcatgallery');
Route::post('/editcatgallery/{id}/edit',[CatgalleryController::class,'update'])->name('admin.updatecatgallery');
Route::get('/statuscatgallery/{id}/update',[CatgalleryController::class,'destroy'])->name('admin.statuscatgallery');

// gallery
Route::get('/admin-gallery',[GalleryController::class,'index'])->name('admin.gallery');
Route::get('/addgallery',[GalleryController::class,'create'])->name('admin.addgallery');
Route::post('/addgallery',[GalleryController::class,'store'])->name('admin.creategallery');
Route::get('/editgallery/{id}/edit',[GalleryController::class,'edit'])->name('admin.editgallery');
Route::post('/editgallery/{id}/edit',[GalleryController::class,'update'])->name('admin.updategallery');
Route::get('/statusgallery/{id}/update',[GalleryController::class,'destroy'])->name('admin.statusgallery');


Route::get('/login', function () { return view('admin.dash'); })->name('admin');

Route::post('/contact',[HomeController::class,'store'])->name('user.contact');

Route::get('/blogs',[BlogController::class,'show'])->name('user.blogs');
Route::get('/blogs/{slug}',[BlogController::class,'details'])->name('user.blogs.details');

Route::get('/{category}',[ServiceController::class,'show'])->name('user.services');
Route::get('/{category}/{slug}',[SubserviceController::class,'show'])->name('user.service.details');

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
