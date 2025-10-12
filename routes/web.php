<?php


use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubserviceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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



Route::get('/login', function () { return view('admin.dash'); })->name('admin');

Route::post('/contact',[HomeController::class,'store'])->name('user.contact');

Route::get('/blogs',[BlogController::class,'show'])->name('user.blogs');
Route::get('/blogs/{slug}',[BlogController::class,'details'])->name('user.blogs.details');

Route::get('/{category}',[ServiceController::class,'show'])->name('user.services');
Route::get('/{category}/{slug}',[SubserviceController::class,'show'])->name('user.service.details');

