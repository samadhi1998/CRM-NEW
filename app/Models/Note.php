<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;


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