<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
});
Route::get('/login', function () {
    return view('admin.dash');
});


