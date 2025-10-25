<?php

namespace App\Http\Controllers;

use App\Models\catgallery;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class GalleryController extends Controller
{
    public function index()
    {
        $galleries = gallery::with('catgallery')->get();
        return view('admin.gallery', compact('galleries'));
    }
    public function create()
    {
        $categories=catgallery::where("status",true)->get();
        return view('admin.addgallery',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|integer|exists:catgalleries,id',
            'priority' => 'required|integer',
            'img1'     => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $priority = $request->input('priority');
        $categoryId = $request->input('category');

        if ($priority <= 10) {
            $existingPriority = gallery::where('priority', $priority)->where('priority', '<=', 10)->first();

            if ($existingPriority) {
                return back()->withErrors(['priority' => "Priority {$priority} is already taken. Priorities 1-10 must be unique across all categories."])->withInput();
            }
        } else {
            $existingImage = gallery::where('category_id', $categoryId)->where('priority', $priority)->first();
            if ($existingImage) {
                return back()->withErrors(['priority' => 'This priority is already taken in the selected category.'])->withInput();
            }
        }
        $image1Path = null;
        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $baseName = Str::slug($request->input('name'));
            $ext = strtolower($image1->getClientOriginalExtension());
            $filename = $baseName . '-' . time() . '.' . $ext;
            $image1Path = $image1->storeAs('Gallery', $filename, 'public');
        }
        gallery::create([
            'title'       => $request->input('name'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'category_id' => $categoryId,
            'priority'    => $priority,
            'image'       => $image1Path,
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Image added successfully');
    }

    public function show(gallery $gallery)
    {
        //
    }
    public function edit($id)
    {
        $gallery=gallery::findOrFail($id);
        $categories=catgallery::where("status",true)->get();
        return view('admin.editgallery',compact('gallery','categories'));
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|integer|exists:catgalleries,id',
            'priority' => 'required|integer',
            'img1'     => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $priority = $request->input('priority');
        $categoryId = $request->input('category');

        if ($priority <= 10) {
            $existingPriority = gallery::where('priority', $priority)->where('priority', '<=', 10)->first();
            if ($existingPriority) {
                return back()->withErrors(['priority' => "Priority {$priority} is already taken. Priorities 1-10 must be unique across all categories."])->withInput();
            }
        } else {
            $existingPriority = gallery::where('category_id', $categoryId)->where('priority', $priority)->first();
            if ($existingPriority) {
                return back()->withErrors(['priority' => 'This priority is already taken in the selected category.'])->withInput();
            }
        }
        if ($request->hasFile('image')) {
            $image1 = $request->file('image');
            $name1  = Str::slug($request->input('name'));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('Gallery', $filename1, 'public');
        }else{
            $image1Path=$request->input('old_img1');
        }
        $gallery=gallery::findOrFail($id);
        $gallery->update([
            'title'       => $request->input('name'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'category_id' => $categoryId,
            'priority'    => $priority,
            'image'       => $image1Path,
        ]);
        return redirect()->route('admin.gallery')->with('success','Photo Updated Successfully');
    }
    public function destroy($id)
    {
        $gallery=gallery::findOrFail($id);
        if($gallery->status){
            $gallery->update([
                'status'=>0,
                'priority'=> -1,
            ]);
            $msg="Image Deactivated Successfully, Priority has been cleared.";
        }else{
            $gallery->update(['status'=>1]);
            $msg="Image Activated Successfully.";
        }
        return redirect()->route('admin.gallery')->with('success',$msg);
    }
}
