<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
});
Route::get('/admin', function () {
    return view('admin.dash');
});
