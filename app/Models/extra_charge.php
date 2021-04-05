<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class extra_charge extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $table = 'extra_charges';
    protected $primaryKey = "ExtraChargeID";

    public $sortable = ['ExtraChargeID', 'Description', 'Amount'];
}