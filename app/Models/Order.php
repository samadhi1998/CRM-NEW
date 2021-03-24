<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'OrderID','CustomerID','Progress','created_at','Due_date','Advance','Discount','Total_Price','Total_Price','TaskID',
        'CustomerCareID','QuotationEmpID','FollowUpID',
    ];


    protected $primaryKey = 'OrderID';


    public function products()
    {
        return $this->belongsToMany(products::class);
    }

    
    public function notes()
    {
        return $this->belongsTo(Note::class);
    }

}