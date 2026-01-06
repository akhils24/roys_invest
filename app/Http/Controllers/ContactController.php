<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = contact::all();
        return view('admin.contacts',compact('contacts'));
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
    public function show(contact $contact)
    {
        //
    }
    public function edit(contact $contact)
    {
        //
    }
    public function update(Request $request, contact $contact)
    {
        //
    }

    public function destroy($id)
    {
        $contact = contact::find($id);
        if ($contact) {
            $contact->update(['status' => 1]);
        }
        return redirect()->back()->with('success','Message marked as read');
    }
}
