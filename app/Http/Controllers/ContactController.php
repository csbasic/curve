<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $subtitle = 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit';
        return view("contact.index", ['page' => 'Contact', 'subtitle' => $subtitle]);
    }
}
