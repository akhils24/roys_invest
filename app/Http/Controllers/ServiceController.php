<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\partners;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = service::all();
        return view('admin.services', compact('services'));
    }
    public function create()
    {
        return view('admin.addservices');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'required|string|max:255',
            'description' => 'required|string',
            'img1'       => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $image1Path = null;
        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('services', $filename1, 'public');
        }

        service::create([
            'name'        => $request->input('name'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'icon'        => $request->input('icon'),
            'description' => $request->input('description'),
            'image'       => $image1Path,
        ]);
        return redirect()->route('admin.services')->with('success','Service added successfully');
    }
    public function show($category)
    {
        $service= service::where('slug', $category)->with('subservices')->firstOrFail();
        if($service->subServices->count() > 1) {
            $subservices = $service->subServices->where('status',true);
            if($service->slug == 'mutual-funds') {
                $partners=partners::where('category','Mutual Fund')->where('status',true)->get();
                return view('users.service-mutual-funds', compact('service','subservices','partners'));
            } else {
                return view('users.service-list', compact('service','subservices'));
            }
        } else {
            // $subservice = Subservice::where('slug', $slug)->where('service_id', $service->id)->firstOrFail();
            $relatedservices=service::where('status',true)->get();
            $subservice = $service->subServices->where('status', true)->first();
            $recentblogs = blog::where('status', true)->latest()->take(5)->get();
            return view('users.service', compact('subservice','service','recentblogs','relatedservices'));
        }
    }
    public function edit($id)
    {
        $service=service::findOrFail($id);
        return view('admin.editservices',compact("service"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            $image1 = $request->file('image');
            $name1  = Str::slug(pathinfo($image1->getClientOriginalName(), PATHINFO_FILENAME));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('services', $filename1, 'public');
        }else{
            $image1Path=$request->input('old_img1');
        }

        $service = service::findOrFail($id);
        $service->update([
            'name'        => $request->input('name'),
            'slug'        => Str::slug($request->input('name'), '-'),
            'icon'        => $request->input('icon'),
            'description' => $request->input('description'),
            'image'       => $image1Path,
        ]);
        return redirect()->route('admin.services')->with('success','Service Updated Successfully');
    }

    public function destroy($id)
    {
        $service=service::findOrFail($id);
        $service->update(['status'=>$service->status ? 0:1]);
        return redirect()->route('admin.services')->with('success','Service Updated Successfully');
    }
}
