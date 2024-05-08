<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact()
    {
        return view("contact.create", ['page' => 'Contact']);
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

    public function listContacts()
    {
        return view('contact.list', ['contacts' => Contact::latest()->simplePaginate(6), 'page' => 'Contact List']);
    }

    public function showContact(Contact $contact)
    {
        $formFields['status'] = 0;
        $contact->update($formFields);
        return view('contact.detail', ['contact' => $contact, 'page' => 'Contact Detail']);
    }
}
