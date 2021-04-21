<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([

            [
                'Status'=>'Invoice',
                'Due_date'=>Carbon::create('2021', '04', '29'),
                'Advance'=> 0,
                'Discount'=>'500',
                'CustomerID' =>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Status'=>'Invoice',
                'Due_date'=>Carbon::create('2021', '04', '30'),
                'Advance'=> 15000,
                'Discount'=>'1000',
                'CustomerID' =>'2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Status'=>'Invoice',
                'Due_date'=>Carbon::create('2021', '05', '01'),
                'Advance'=> 12000,
                'Discount'=>'1000',
                'CustomerID' =>'3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Status'=>'Invoice',
                'Due_date'=>Carbon::create('2021', '05', '05'),
                'Advance'=> 30000,
                'Discount'=>'1000',
                'CustomerID' =>'4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
          
        ]);
    }
}