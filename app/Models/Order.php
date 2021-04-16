<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'OrderID','CustomerID','Progress','created_at','Due_date','Advance','Discount','Total_Price','Total_Price','TaskID','Status',
        'CustomerCareID','QuotationEmpID','FollowUpID',
    ];

    public $sortable = ['OrderID', 'Due_Date', 'Advance', 'Total_Price', 'created_at'];

    protected $primaryKey = 'OrderID';


    public function products()
    {
        return $this->belongsToMany(product::class,'order_product', 'order_OrderID', 'product_ProductID')->withPivot(['Qty'])->withTimestamps();
    }

    
    public function notes()
    {
        return $this->belongsTo(Note::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'TaskID');
    }

    public function customers()
    {
        return $this->belongsTo(customer::class, 'CustomerID');
    }

}