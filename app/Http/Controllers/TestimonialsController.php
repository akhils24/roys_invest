<?php

namespace App\Http\Controllers;

use App\Models\testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index(testimonials $testimonials){
        $testimonials = testimonials::all();
        return view('admin.testimonials', compact('testimonials'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
         $data = $request->validate([
            'author_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'text' => 'required|string|min:10|max:2000',
        ]);
        testimonials::create($data);

        return back()->with('testimonial', 'Thank you! Your review matters a lot.')->withFragment('testimonial-form');
    }
    public function show(){
        $reviews = testimonials::where('approved', true)->inRandomOrder()->get()
        ->map(function ($r) {
                $relativeTime = $r->source === 'google' ? $r->google_relative_time : $r->created_at->diffForHumans();
                return [
                    'author_name' => $r->author_name,
                    'rating' => $r->rating,
                    'text' => $r->text,
                    'profile_photo_url' => $r->profile_photo_url,
                    'relative_time_description' => $relativeTime,
                ];
            });
        return response()->json([
            'reviews' => $reviews,
            'provider_url' => null
        ]);
    }
    public function edit(testimonials $testimonials)
    {
        //
    }
    public function update(Request $request, testimonials $testimonials)
    {
        //
    }
    public function destroy($id)
    {
        $testimonials=testimonials::findOrFail($id);
        $testimonials->update(['approved'=>$testimonials->approved ? 0:1]);
        return redirect()->route('admin.testimonials')->with('success','Testimonial Updated Successfully');
    }
}
