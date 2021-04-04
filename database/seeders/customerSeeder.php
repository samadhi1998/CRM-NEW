<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('customers')->insert([
            [
                'Name'=>'Thilini Abesekara',
                'NIC'=>'985513150V',
                'Email'=>'thiliniabesekara@gmail.com',
                'MobileNo'=>'0768811880',
                'Address'=>'"166/13,Divulapitiya,Gampaha"',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'Name'=>'Thisal Samarakoon',
                'NIC'=>'964413350V',
                'Email'=>'thisalvindulaa@gmail.com',
                'MobileNo'=>'0714567898',
                'Address'=>'"23/66,Ganemulla,Gampaha"',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'Name'=>'Pubudu Madushan',
                'NIC'=>'975553159V',
                'Email'=>'pubudumadushan@gmail.com',
                'MobileNo'=>'0776190806',
                'Address'=>'"44/3,Divulapitiya,Kaluthara"',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'Name'=>'Nathasha walitharage',
                'NIC'=>'9867453159V',
                'Email'=>'nathashawalitharage@gmail.com',
                'MobileNo'=>'0716789653',
                'Address'=>'"3rd road,Mathale"',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]


            ]
        
        );
    }



    }

