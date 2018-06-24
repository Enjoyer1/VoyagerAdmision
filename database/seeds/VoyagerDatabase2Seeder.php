<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDatabase2Seeder extends Seeder
{
    use Seedable;

    protected $seedersPath;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedersPath = database_path('seeds').'/';
        $this->seed('VoyagerDatabaseSeeder');
        $this->seed('VoyagerDummyDatabaseSeeder');
        $this->seed('DataTypes2TableSeeder');
        $this->seed('DataRows2TableSeeder');
        $this->seed('MenuItems2TableSeeder');
        $this->seed('Permissions2TableSeeder');
        $this->seed('PermissionRoleTableSeeder');

    }
}
