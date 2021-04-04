<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'Name'=>'Ceiling Fan ',
                'Brand'=>'Singer',
                'image'=>'Singer Ceiling Fan.jpg',
                'Description'=>'High-Grade And Beautiful',
                'Warranty'=>'One Year Warrantly',
                'Price'=>'6999',
                'Qty'=>'100',
                'Status'=>'In Stock',
                'stock_defective'=>'0',
                'AdminID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Name'=>' Vista 43 Full HD Android Smart TV',
                'Brand'=>'Singer',
                'image'=>'SmartTV.jpg',
                'Description'=>'43 FHD LED Smart ,
                Resolution: 1920 x 1080  ,
                Android',
                'Warranty'=>'Three Year Warrantly',
                'Price'=>'87999',
                'Qty'=>'200',
                'Status'=>'In Stock',
                'stock_defective'=>'1',
                'AdminID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Name'=>' Green Inverter Air Conditioner ',
                'Brand'=>'Singer',
                'image'=>'Green Inverter Air Conditioner.jpg',
                'Description'=>'High-Grade And Beautiful',
                'Warranty'=>'One Year Warrantly',
                'Price'=>'120419',
                'Qty'=>'50',
                'Status'=>'In Stock',
                'stock_defective'=>'0',
                'AdminID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Name'=>'Domestic Water Pump',
                'Brand'=>'Singer',
                'image'=>'Domestic Water Pump .jpg',
                'Description'=>'"52Ft, 1.25 X 1, 0.5HP, Stainless Steel Volute Face Cover"',
                'Warranty'=>'One Year Warrantly',
                'Price'=>'14799',
                'Qty'=>'30',
                'Status'=>'In Stock',
                'stock_defective'=>'0',
                'AdminID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ]);
    }
    }

