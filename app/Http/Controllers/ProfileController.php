<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {

        return view('profile.index', ['page' => 'User Profile', 'user' => $user]);
    }

    public function editProfile(User $user)
    {

        return view('profile.edit', ['page' => 'Edit Profile', 'user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        if ($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    }
}
