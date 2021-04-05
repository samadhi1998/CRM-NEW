<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $table = 'customers';
    protected $primaryKey = "CustomerID";

    public function orders()
    {
        return $this->hasmany(Order::class, 'orders');
    }

    public $sortable = ['CustomerID', 'Name', 'Email'];
}
