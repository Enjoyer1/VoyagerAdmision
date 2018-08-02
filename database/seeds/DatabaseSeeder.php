<?php

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
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(VoyagerDummyDatabaseSeeder::class);
        $this->call(CiudadesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);


    }
}
