<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\gallery;
use App\Models\service;
use App\Models\contact;
use App\Models\subservice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs=blog::latest()->where('status', true)->take(3)->get();
        $services=service::all()->where('status', true);
        $galleries = gallery::query()->where('status', true)->whereBetween('priority',[1,10] )->orderBy('priority')->limit(8)->get();
        return view("users.index",compact('blogs','services','galleries'));
    }

    public function about()
    {
        return view("users.about");
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
