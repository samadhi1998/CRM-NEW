<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priviledge extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'PriviledgeID';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_priviledges', 'PriviledgeID', 'ID')->withTimestamps();
    }

}
