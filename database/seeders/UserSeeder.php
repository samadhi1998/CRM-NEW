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
                'Address'=>'"Darshani,Ethanamadala,Kalutara North"',
                'MobileNo'=>'0718890568',
                'password'=>bcrypt("12345678"),
                'RoleID'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
