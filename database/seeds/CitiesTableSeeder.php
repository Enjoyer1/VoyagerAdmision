<?php

use App\city;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;

use TCG\Voyager\Models\Permission;

use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //datatype seeder
        $dataType = $this->dataType('slug', 'cities');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'cities',
                'display_name_singular' => __('voyager::seeders.data_types.city.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.city.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\City',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //datarow seeder
        $cityDataType = DataType::where('slug', 'cities')->firstOrFail();


        $dataRow = $this->dataRow($cityDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 2,
            ])->save();
        }


        $dataRow = $this->dataRow($cityDataType, 'city_belongsto_region_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('voyager::seeders.data_types.region.singular'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Region","table":"regions","type":"belongsTo","column":"region_id","key":"id","label":"name","pivot_table":"cities","pivot":"0"}',
                'order' => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'region_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => ('Region_id'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 4,
            ])->save();
        }

        // cities seeder
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('cities')->insert([
                'name' => $faker->city,
                'region_id' => $faker->numberBetween(1, 10),

            ]);
        }


        //permision for cities

        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('cities');
    }

    //datatypeseed
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

    //datarow seed
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }



}
