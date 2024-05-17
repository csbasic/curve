<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class RolesController extends Controller
{
    // List Roles
    public function listRoles()
    {
        return view('roles.list', ['roles' => Role::all()]);
    }

    // create role
    public function create()
    {
        return view('roles.create');
    }

    // store role
    public function store(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $formField = $request->validate(['name' => 'required']);

        Role::create($formField);

        return redirect('/roles')->with('message', 'Role created successfully!');
    }

    // edit Roles
    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role]);
    }

    // update role
    public function update(Request $request, Role $role)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $formField = $request->validate(['name' => 'required']);

        $role->update($formField);

        return redirect('/roles')->with('message', 'Role updated successfully!');
    }

    // delete Roles
    public function destroy(Role $role)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $role->delete();

        return redirect('/roles')->with('message', 'Role deleted successfully!');
    }
}
