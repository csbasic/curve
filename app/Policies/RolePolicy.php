<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function create(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    public function update(User $user)
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_EDITOR]);
    }

    public function delete(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }
}
