<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // get roles and users
    public function getUserRoles()
    {
        return view('roles.assign', ['roles' => Role::all(), 'users' => User::all()]);
    }

    // store role assiged
    public function assignRole(Request $request)
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

    public function removeRole(Role $role)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $role->delete();

        return back()->with('message', 'Role assiged successfully');
    }
}
