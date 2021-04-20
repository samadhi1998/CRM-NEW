<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Carbon\Carbon;


class order_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->insert([
            [
                'order_OrderID'=>'1',
                'product_ProductID'=>'1',
                'Qty' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'2',
                'product_ProductID'=>'1',
                'Qty' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'2',
                'product_ProductID'=>'2',
                'Qty' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'2',
                'product_ProductID'=>'3',
                'Qty' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'3',
                'product_ProductID'=>'2',
                'Qty' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'3',
                'product_ProductID'=>'3',
                'Qty' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'4',
                'product_ProductID'=>'1',
                'Qty' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_OrderID'=>'4',
                'product_ProductID'=>'3',
                'Qty' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],



            ]);
        }
    }