<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = ['CustomerID','Name','NIC','Email','MobileNo','Address'];
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';

    
    public function order()
    {
        return $this->hasmany(Order::class, 'OrderID');
    }


    public $sortable = ['CustomerID', 'Name', 'Email'];
}
