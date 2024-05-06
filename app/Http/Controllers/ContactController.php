<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $subtitle = 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit';
        return view("contact.index", ['page' => 'Contact', 'subtitle' => $subtitle]);
    }

    public function store(Request $request)
    {

        $formfield = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($formfield);

        return back()->with('message', 'Message sent successfully!');
    }
}
