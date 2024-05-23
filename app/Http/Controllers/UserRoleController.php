<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // get roles and users
    public function getUserRoles()
    {
        return view('roles.assign', ['roles' => Role::all()]);
    }

    // store role assiged
    public function assignRole(Request $request, User $user)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        // dd($user);

        $formFields = $request->validate([
            'role_id' => 'required|integer'
        ]);

        $user->update($formFields);

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
