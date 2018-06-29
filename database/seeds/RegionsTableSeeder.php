<?php

use App\Region;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\Permission;
class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //datatype seed
        $dataType = $this->dataType('slug', 'regions');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'regions',
                'display_name_singular' => __('voyager::seeders.data_types.region.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.region.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\Region',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //datarow seed
        $regionDataType = DataType::where('slug', 'regions')->firstOrFail();


        $dataRow = $this->dataRow($regionDataType, 'id');
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

        $dataRow = $this->dataRow($regionDataType, 'name');
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

        $dataRow = $this->dataRow($regionDataType, 'number');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.number'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($regionDataType, 'region_hasmany_city_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('voyager::seeders.data_types.city.plural'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\City","table":"cities","type":"hasMany","column":"region_id","key":"id","label":"name","pivot_table":"cities","pivot":"0"}',
                'order' => 4,
            ])->save();
        }

    //region seed
        Region::create([
            'name' => 'Tarapacá',
            'number' => 'I',
        ]);

        Region::create([
            'name' => 'Antofagasta',
            'number' => 'II',
        ]);

        Region::create([
            'name' => 'Atacama',
            'number' => 'III',
        ]);
        Region::create([
            'name' => 'Coquimbo',
            'number' => 'IV',
        ]);


        Region::create([
            'name' => 'Valparaíso',
            'number' => 'V',
        ]);

        Region::create([
            'name' => 'Maule',
            'number' => 'VII',
        ]);

        Region::create([
            'name' => 'Bío Bío',
            'number' => 'VIII',
        ]);

        Region::create([
            'name' => 'Araucania',
            'number' => 'IX',
        ]);

        Region::create([
            'name' => 'Los Lagos',
            'number' => 'X',
        ]);
        Region::create([
            'name' => 'Los Ríos',
            'number' => 'XIV',
        ]);


        //permision  for regions

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

        Permission::generateFor('regions');


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
