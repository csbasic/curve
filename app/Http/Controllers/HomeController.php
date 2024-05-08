<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    public function index()
    {
        $cluster = array(
            'posts' => Post::latest()->take(3)->get(),
            'authors' => User::all(),
        );
        return view('home.index', ['cluster' => $cluster]);
    }
}
