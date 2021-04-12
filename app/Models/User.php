<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes,Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'mobileNo',
        'emptype',
        'RoleID'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = "EmpID";

    public function roles()
    {
        return $this->belongsTo(Role::class, 'RoleID');
    }

    
    public function getIsAdminAttribute()
    {
        return $this->roles()->where('RoleID', 1)->exists();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function products()
    {
        return $this->hasMany(products::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public $sortable = ['EmpID', 'name', 'email'];

    public function Message()
    {
        return $this->hasOne(Message::class);
    }

}
