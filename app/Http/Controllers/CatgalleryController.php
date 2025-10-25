<?php

namespace App\Http\Controllers;

use App\Models\catgallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatgalleryController extends Controller
{
    public function index()
    {
        $categories = catgallery::all();
        return view('admin.catgallery', compact('categories'));
    }

    public function create()
    {
        return view('admin.addcatgallery');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:catgalleries,name',
            'description' => 'nullable|string',
            'display_order' =>  'required|integer|min:0|unique:catgalleries,display_order',
        ]);

        catgallery::create([
            'name' => $request->name,
            'slug' => Str::slug($request->input('name'), '-'),
            'description' => $request->description,
            'display_order' => $request->display_order,
        ]);

        return redirect()->route('admin.catgallery')->with('success', 'Category Created Successfully');
    }

    public function show(catgallery $catgallery)
    {
        //
    }

    public function edit($id)
    {
        $category=catgallery::findOrFail($id);
        return view('admin.editcatgallery', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:catgalleries,name',
            'description' => 'nullable|string',
            'display_order' =>  'required|integer|min:0|unique:catgalleries,display_order,'.$id,
        ]);
        $category=catgallery::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->input('name'), '-'),
            'description' => $request->description,
            'display_order' => $request->display_order,
        ]);
        return redirect()->route('admin.catgallery')->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category=catgallery::findOrFail($id);
        $category->update(['status'=>$category->status ? 0:1]);
        return redirect()->route('admin.catgallery')->with('success','Category Updated Successfully');
    }
}
