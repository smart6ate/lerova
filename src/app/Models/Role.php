<?php

namespace App\Models\Lerova;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $guarded = [];

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
