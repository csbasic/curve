<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function curve()
    {
        return view('about.curve', ['page' => 'About']);
    }

    public function team()
    {
        return view('about.team', ['page' => 'Team']);
    }
}
