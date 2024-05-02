<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $subtitle = 'We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less informed than the masses';
        return view('profile.index', ['page' => 'User Profile', 'user' => $user, 'subtitle' => $subtitle]);
    }

    public function editProfile(User $user)
    {
        $subtitle = 'We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less informed than the masses';
        return view('profile.edit', ['page' => 'Edit Profile', 'user' => $user, 'subtitle' => $subtitle]);
    }

    public function store(Request $request, User $user)
    {
        if ($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    }
}
