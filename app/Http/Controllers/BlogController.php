<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use function Symfony\Component\String\b;

class BlogController extends Controller
{
  
    public function index()
    {
        $blogs=blog::all();
        return view("admin.blogs",compact("blogs"));
    }

    public function create()
    {
        return view("admin.addblogs");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'img1'    => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'img2'    => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        $image1Path = null;
        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('blogs', $filename1, 'public');
        }

        // Handle img2 (optional)
        $image2Path = null;
        if ($request->hasFile('img2')) {
            $image2 = $request->file('img2');
            $name2  = Str::slug(pathinfo($image2->getClientOriginalName(), PATHINFO_FILENAME));
            $ext2   = strtolower($image2->getClientOriginalExtension());
            $filename2 = $name2 . '-' . time() . '.' . $ext2;
            $image2Path = $image2->storeAs('blogs', $filename2, 'public');
        }

        blog::create([
            'title'=> $request->input('title'),
            'slug'=> Str::slug($request->input('title'),'-'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'author'  => 'Admin', // You can modify this to get the actual author's name
            'image1'  => $image1Path,
            'image2'  => $image2Path,
        ]);
        return redirect()->route('admin.blogs')->with('success','Blog Updated Successfully');

    }
    public function show(Request $request)
    {
        $query = blog::query();
        $query->where('status', true);
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        $blogs = $query->latest()->get();
        return view('users.blogs',compact('blogs'));
    }

    public function details($slug) {
        $blog=blog::where('slug',$slug)->where('status', true)->firstOrFail();
        $recentblogs = Blog::where('slug', '!=', $slug)->where('status', true)->latest()->take(5)->get();
        return view('users.blog-details',compact('blog','recentblogs'));
        
    }

    public function edit($id)
    {
        $blog=blog::findOrFail($id);
        return view('admin.editblogs',compact("blog"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'img1'    => 'image|mimes:jpg,jpeg,png,gif,webp',
            'img2'    => 'image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('blogs', $filename1, 'public');
        }else{
            $image1Path=$request->input('old_img1');
        }
        if ($request->hasFile('img2')) {
            $image2 = $request->file('img2');
            $name2  = Str::slug(pathinfo($image2->getClientOriginalName(), PATHINFO_FILENAME));
            $ext2   = strtolower($image2->getClientOriginalExtension());
            $filename2 = $name2 . '-' . time() . '.' . $ext2;
            $image2Path = $image2->storeAs('blogs', $filename2, 'public');
        }else{
            $image2Path=$request->input('old_img2');
        }

        $blog = blog::findOrFail($id);
        $blog->update([
            'title'   => $request->input('title'),
            'slug'=> Str::slug($request->input('title'),'-'),
            'content' => $request->input('content'),
            'category'=> $request->input('category'),
            'author'  => 'Admin', // You can modify this to get the actual author's name
            'image1'  => $image1Path,
            'image2'  => $image2Path,
        ]);
        return redirect()->route('admin.blogs')->with('success','Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog=blog::findOrFail($id);
        $blog->update(['status'=>$blog->status ? 0:1]);
        return redirect()->route('admin.blogs')->with('success','Blog Updated Successfully');
    }
}