<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=blog::all();
        return view("admin.blogs",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.addblogs");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'img1'    => 'required|image|mimes:jpg,jpeg,png,gif',
            'img2'    => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $image1Path = $request->file('img1')->store('blogs', 'public');
        $image2Path = $request->file('img2') ? $request->file('img2')->store('blogs', 'public') : null;

        blog::create([
            'title'   => $request->input('title'),
            'content' => $request->input('content'),
            'author'  => 'Admin', // You can modify this to get the actual author's name
            'image1'  => $image1Path,
            'image2'  => $image2Path,
        ]);
        return redirect()->route('admin.blogs')->with('success','Blog Updated Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
    }
}