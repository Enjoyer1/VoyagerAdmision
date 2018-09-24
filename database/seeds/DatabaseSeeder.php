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
        $this->call(ProgramasTableSeeder::class);
        $this->call(ColegiosTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(EstudiantesTableSeeder::class);
        $this->call(PreferenciasTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);


    }
}
