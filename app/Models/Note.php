<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    public function orders()
    {
        return $this->hasmany(Order::class, 'orders');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users');
    }

    protected $primaryKey = 'NoteID';

}