<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Method for homepage (user side)
    public function index()
    {
        $galleries = Gallery::where('is_active', true)->latest()->get();
        return view('users.index', compact('galleries'));
    }

    // Method for admin gallery list
    public function adminIndex()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery', compact('galleries'));
    }

    // Method for show create form
    public function create()
    {
        return view('admin.addgallery');
    }

    // Method for store new image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string|max:500'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
            
            Gallery::create([
                'title' => $request->title,
                'image_path' => $imagePath,
                'description' => $request->description,
                'is_active' => $request->has('is_active')
            ]);

            return redirect()->route('admin.gallery')->with('success', 'Image added successfully!');
        }

        return back()->with('error', 'Image upload failed!');
    }

    // Method for delete image
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();

        return redirect()->route('admin.gallery')->with('success', 'Image deleted successfully!');
    }
}