<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PriviledgeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RolePriviledgeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(productSeeder::class);
        $this->call(customerSeeder::class);
    }
}
