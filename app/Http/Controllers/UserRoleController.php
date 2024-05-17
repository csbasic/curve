<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserRoleController extends Controller
{
    // get roles and users
    public function assignRole()
    {
        return view('roles.assign', ['roles' => Role::all(), 'users' => User::all()]);
    }

    // store role assiged
    public function store(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ]);

        UserRole::create($formFields);

        return back()->with('message', 'Role assiged successfully');
    }
}
