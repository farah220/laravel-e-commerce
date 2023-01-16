<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => ['required','max:255'],
            'last_name' => ['required','max:255'],
            'subject' => ['required','max:255'],
            'message' => ['required','max:255'],
        ]);
        Contact::create($attributes);
        return redirect()->route('web.contact.index')->with('success_message','Sent!');
    }


}
