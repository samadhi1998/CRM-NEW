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
    protected $fillable =['ProductID','Name','Brand','image','Description','Price','Qty','Status','stock_defective','AdminID','ReOrderLevel'];
    public $sortable = ['Name', 'Qty', 'Price'];

    
    public function users()
    {
        return $this->belongsTo(User::class,'EmpID');
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_product', 'product_ProductID', 'order_OrderID')->withPivot(['Qty'])->withTimestamps();
    }
 
}