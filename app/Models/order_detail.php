<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'OrderID','ProductID','Qty','Description',
    ];
}
