<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function priviledges(){
        return $this->belongsToMany(Priviledge::class, 'role_priviledges');
    }
    
    public function users(){
        return $this->belongsToMany(User::class, 'users');
    }



    protected $primaryKey = 'RoleID';

    public function hasAccess(string $priviledge)
    {
        foreach($priviledges as $priviledge){
            if($this->hasPermission($priviledge)){
                return true;
            }
        }
        return false;
    }


}
