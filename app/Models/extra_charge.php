<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extra_charge extends Model
{
    use HasFactory;
    protected $table = 'extra_charges';
    protected $primaryKey = "ExtraChargeID";
}