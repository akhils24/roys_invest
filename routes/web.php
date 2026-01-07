<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatgalleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GoogleReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubserviceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/api/google-reviews', [GoogleReviewController::class, 'api'])->name('google.reviews.api');
Route::get('/proxy-image', [GoogleReviewController::class, 'proxyImage'])->name('proxy.image');


// admin side management
Route::get('/admin/login', [AuthController::class, 'show'])->name('login');
Route::post('/admin/login', [AuthController::class, 'index'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function (){
    
    Route::get('/admin/dashboard', function () { return view('admin.dash'); })->name('admin.dashboard');
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

    //contact messages
    Route::get('/admin-contacts',[ContactController::class,'index'])->name('admin.contacts');
    Route::get('/statuscontact/{id}/update',[ContactController::class,'destroy'])->name('admin.statuscontact');

    //Partners management
    Route::get('/admin-partners',[PartnersController::class,'index'])->name('admin.partners');
    Route::get('/addpartners',[PartnersController::class,'create'])->name('admin.addpartners');
    Route::post('/addpartners',[PartnersController::class,'store'])->name('admin.createpartners');
    Route::get('/editpartners/{id}/edit',[PartnersController::class,'edit'])->name('admin.editpartners');
    Route::post('/editpartners/{id}/edit',[PartnersController::class,'update'])->name('admin.updatepartners');
    Route::get('/statuspartners/{id}/update',[PartnersController::class,'destroy'])->name('admin.statuspartners');
});

// user side routes
Route::post('/contact',[ContactController::class,'store'])->name('user.contact');

Route::get('/gallery',[GalleryController::class,'show'])->name('user.gallery');

Route::get('/blogs',[BlogController::class,'show'])->name('user.blogs');
Route::get('/blogs/{slug}',[BlogController::class,'details'])->name('user.blogs.details');

Route::get('/{category}',[ServiceController::class,'show'])->name('user.services');
Route::get('/{category}/{slug}',[SubserviceController::class,'show'])->name('user.service.details');
