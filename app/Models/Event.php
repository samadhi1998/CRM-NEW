<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $table="events";
    protected $fillable=["title","color","start_date","end_date"];
    public $sortable = ['id', 'title', 'start_date','end_date'];
}
