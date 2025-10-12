<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\service;
use App\Models\subservice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubserviceController extends Controller
{
    public function index()
    {
        $subservices = Subservice::with('service')->get();
        return view('admin.subservices', compact('subservices'));
    }
    public function create()
    {
        $services=service::where("status",true)->get();
        return view('admin.addsubservices',compact('services'));
    }
    public function store(Request $request)
    {
         $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|integer|exists:services,id',
            'content'        => 'required|string',
            'description' => 'required|string',
            'img1'       => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $image1Path = null;
        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('Subservices', $filename1, 'public');
        }

        subservice::create([
            'name'        => $request->input('name'),
            'service_id' => $request->input('category'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'content'        => $request->input('content'),
            'description' => $request->input('description'),
            'image'       => $image1Path,
        ]);
        return redirect()->route('admin.subservices')->with('success','Sub Service added successfully');
    }
    public function show($category,$slug)
    {
        $service= service::where('slug', $category)->with('subservices')->firstOrFail();
        $subservice = Subservice::where('slug', $slug)->where('service_id', $service->id)->where('status',true)->firstOrFail();
        $recentblogs = blog::where('status', true)->latest()->take(5)->get();
        $relatedsubservices = $service->subServices->where('id', '!=', $subservice->id)->where('status',true)->take(9);
        $relatedservices=service::where('status',true)->get();
        return view('users.service-details', compact('subservice','service','recentblogs','relatedsubservices','relatedservices'));
    }
    public function edit($id)
    {
        $services=service::where("status",true)->get();
        $subservice=subservice::with('service')->findOrFail($id);
        return view('admin.editsubservices',compact("subservice","services"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|integer|exists:services,id',
            'content'        => 'required|string',
            'description' => 'required|string',
            'img1'       => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('Subservices', $filename1, 'public');
        }else{
            $image1Path=$request->input('old_img1');
        }
        $subservice = subservice::findOrFail($id);
        $subservice->update([
            'name'        => $request->input('name'),
            'service_id' => $request->input('category'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'content'        => $request->input('content'),
            'description' => $request->input('description'),
            'image'       => $image1Path,
        ]);
        return redirect()->route('admin.subservices')->with('success','Sub Service Updated Successfully');

    }
    public function destroy($id)
    {
        $subservice=subservice::findOrFail($id);
        $subservice->update(['status'=>$subservice->status ? 0:1]);
        return redirect()->route('admin.subservices')->with('success','Sub Service Updated Successfully');
    }
}
