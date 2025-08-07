<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index'); // Loads resources/views/blog/index.blade.php
    }
}
