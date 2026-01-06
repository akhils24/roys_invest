<?php

namespace App\Http\Controllers;

use App\Models\partners;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnersController extends Controller
{

    public function index()
    {
        $partners = partners::all();
        return view('admin.partners',compact('partners'));
    }
    public function create()
    {
        return view('admin.addpartners');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'img1' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);
        $image1Path = null;
        if ($request->hasFile('img1')) {
            $image1 = $request->file('img1');
            $baseName = Str::slug($request->input('name'));
            $ext = strtolower($image1->getClientOriginalExtension());
            $filename = $baseName . '-' . time() . '.' . $ext;
            $image1Path = $image1->storeAs('Partners', $filename, 'public');
        }
        partners::create([
            'name'       => $request->input('name'),
            'category'   => $request->input('category'),
            'logo'       => $image1Path,
        ]);
        return redirect()->route('admin.partners')->with('success', 'Partner added successfully.');
    }
    public function show(partners $partners)
    {
        //
    }
    public function edit($id)
    {
        $partner=partners::findOrFail($id);
        return view('admin.editpartners',compact('partner'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'img1' => 'image|mimes:jpg,jpeg,png,webp',
        ]);
        if ($request->hasFile('image')) {
            $image1 = $request->file('image');
            $name1  = Str::slug($request->input('name'));
            $ext1   = strtolower($image1->getClientOriginalExtension());
            $filename1 = $name1 . '-' . time() . '.' . $ext1;
            $image1Path = $image1->storeAs('Partners', $filename1, 'public');
        }else{
            $image1Path=$request->input('old_img1');
        }
        $partner = partners::findOrFail($id);
        $partner->update([
            'name'       => $request->input('name'),
            'category'   => $request->input('category'),
            'logo'       => $image1Path,
        ]);
        return redirect()->route('admin.partners')->with('success', 'Partner updated successfully.');
    }
    public function destroy($id)
    {
        $partner=partners::findOrFail($id);
        $partner->update(['status'=>$partner->status ? 0:1]);
        return redirect()->route('admin.partners')->with('success', 'Partner status updated successfully.');
    }
}
