<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // get roles and users
    public function getRolePermission()
    {
        return view('permissions.set', ['permissions' => Permission::all(), 'roles' => Role::all()]);
    }

    // store role assiged
    public function assignPermission(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ]);

        Permission::create($formFields);

        return back()->with('message', 'Permission set successfully');
    }

    public function removePermission(Permission $permission)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $permission->delete();

        return back()->with('message', 'Permission removed successfully');
    }
}
