<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = "ProductID";
    protected $fillable = ['ProductID','Name','Brand','image','Description','Price','Qty','Status','AdminID'];
    
    public function users()
    {
        return $this->belongsTo(User::class,'EmpID');
    }
    
    public function orders()
    {
        return $this->hasmany(Order::class, 'orders');
    }
}