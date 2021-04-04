<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    public function order(){
        return $this->hasOne(Order::class, 'OrderID');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $primaryKey = 'TaskID';
    protected $fillable = ['TaskID','Description','ServicePersonID','Added_By','Due_Date','Status'];

}
