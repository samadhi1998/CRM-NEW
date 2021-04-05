<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $table = 'products';
    protected $primaryKey = "ProductID";
    protected $fillable =['ProductID','Name','Brand','image','Description','Price','Qty','Status','stock_defective','AdminID'];
    public $sortable = ['Name', 'Qty', 'Price'];

    
    public function users()
    {
        return $this->belongsTo(User::class,'EmpID');
    }
    
 
}