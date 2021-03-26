<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priviledge extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_priviledges');
    }

    public function inRole($role)
    {
        if (is_int($role)) {
            return $this->roles->contains('RoleID', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
}
