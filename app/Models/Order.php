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
        'OrderID','CustomerID','Progress','created_at','Due_date','Advance','Discount','Total_Price','Total_Price','TaskID',
        'CustomerCareID','QuotationEmpID','FollowUpID',
    ];

    public $sortable = ['OrderID', 'Due_Date', 'Advance', 'Total_Price', 'create_at'];

    protected $primaryKey = 'OrderID';


    public function products()
    {
        return $this->belongsToMany(product::class)->withPivot(['Qty']);
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
        return $this->belongsToMany(customers::class);
    }

}