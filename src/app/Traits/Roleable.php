<?php

namespace App\Traits\Lerova;

use App\Models\Lerova\Role;

trait Roleable
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

}