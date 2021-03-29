<?php

namespace Database\Seeders;
use DB;
use App\Models\Role;
use App\Models\Priviledge;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::insert([
            [
                'name'=>'Super-Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        
    }
}
