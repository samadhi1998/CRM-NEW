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

    public function hasPermission(string $priviledge)
    {
        if($priviledge = $this->priviledge){
            return true;
        }

        return $priviledge??false;
    }

}
