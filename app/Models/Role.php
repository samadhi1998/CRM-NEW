<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    public function priviledges(){
        return $this->belongsToMany(Priviledge::class, 'role_priviledges', 'ID', 'PriviledgeID')->withTimestamps();
    }
    
    public function users(){
        return $this->belongsToMany(User::class, 'users');
    }

    protected $primaryKey = 'RoleID';


}
