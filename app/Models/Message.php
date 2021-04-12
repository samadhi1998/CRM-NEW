<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['from','to', 'message','is_read','OrderID', 'FollowUpID'];
    protected $primaryKey = 'id';

    public function Order(){
        return $this->hasMany(Order::class, 'OrderID', 'OrderID');
    }

    public function User()
    {
        return $this->belongsTo(User::class , 'FollowUpID', 'EmpID');
    }
}
