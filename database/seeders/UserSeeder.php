<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Samadhi Jayawardena',
                'email'=>'jayawardena141@gmail.com',
                'Address'=>'Darshani,Ethanamadala,Kalutara North',
                'MobileNo'=>'0718890568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Lakmini Fernando',
                'email'=>'lakmini@gmail.com',
                'Address'=>'Keselwatta, Panadure',
                'MobileNo'=>'0718897568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Asha Sewwandi',
                'email'=>'asha@gmail.com',
                'Address'=>'Galle, Hiniduma',
                'MobileNo'=>'0718097568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Annsha Mathavan',
                'email'=>'annsha@gmail.com',
                'Address'=>'Hatton',
                'MobileNo'=>'0768897568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Saman Jayawardena',
                'email'=>'saman@gmail.com',
                'Address'=>'Darshani,Ethanamadala,Kalutara North',
                'MobileNo'=>'0718847568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
           
        ]);
    }
}
