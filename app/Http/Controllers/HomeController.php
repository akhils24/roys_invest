<?php

namespace App\Http\Controllers;

use App\Models\blog;
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
        return view("users.index",compact('blogs','services'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'        => 'required|string|max:255',
            'subject' => 'string',
            'message'       => 'required|string',
        ]);
        contact::create([
            'name'        => $request->input('name'),
            'email'        => $request->input('email'),
            'subject' => $request->input('subject'),
            'message'       => $request->input('message'),
        ]);
        return redirect()->back()->with('contact','Your message has been sent. Thank you!');
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
