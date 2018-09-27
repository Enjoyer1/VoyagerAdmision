<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Colegio;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ColegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
      |--------------------------------------------------------------------------
      | Colegios
      |--------------------------------------------------------------------------
      */

        //dataty seeeder
        $dataType = $this->dataType('slug', 'colegios');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'colegios',
                'display_name_singular' => 'Colegio',
                'display_name_plural' => 'Colegios',
                'icon' => 'voyager-study',
                'model_name' => 'App\\Colegio',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => 'Colegios de los Alumnos',
                'server_side' => 1,
            ])->save();
        }

        //datarow seeder
        $colegioDataType = DataType::where('slug', 'colegios')->firstOrFail();

        $dataRow = $this->dataRow($colegioDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'hidden',
                'display_name' => 'ID',
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

        $dataRow = $this->dataRow($colegioDataType, 'nombre');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Nombre',
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
        $dataRow = $this->dataRow($colegioDataType, 'celular');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Celular',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($colegioDataType, 'direccion');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Dirección',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($colegioDataType, 'ciudad_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Ciudad',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($colegioDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Creado en',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($colegioDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Actualizado en',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($colegioDataType, 'colegio_belongsto_ciudad_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Ciudad',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Ciudad","table":"ciudades","type":"belongsTo","column":"ciudad_id","key":"id","label":"nombre","pivot_table":"colegios","pivot":"0"}',
                'order' => 8,
            ])->save();
        }
        $dataRow = $this->dataRow($colegioDataType, 'colegio_hasmany_estudiante_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Estudiantes',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Estudiante","table":"estudiantes","type":"hasMany","column":"colegio_id","key":"id","label":"nombre","pivot_table":"estudiantes","pivot":"0"}',
                'order' => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($colegioDataType, 'colegio_belongstomany_programa_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Programas',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Programa","table":"programas","type":"belongsToMany","column":"id","key":"id","label":"nombre","pivot_table":"colegio_programa","pivot":"1","taggable":"0"}',
                'order' => 10,
            ])->save();
        }


        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => ('Colegios'),
            'url' => '',
            'route' => 'voyager.colegios.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => null,
                'parent_id' => null,
                'order' => 8,
            ])->save();
        }

        //Permissions
        Permission::generateFor('colegios');

        // colegios seeder
        $faker = Faker::create();
        foreach (range(1, 40) as $index) {
            Colegio::create([
                'nombre' => $faker->userName,
                'celular' => $faker->buildingNumber,
                'direccion' => $faker->city,
                'ciudad_id' => $faker->numberBetween((1), (10)),
                'created_at' => '2018-09-19 19:48:10',
                'updated_at' => '2018-09-19 19:48:10',

            ])->programas()->attach([random_int(1, 9), 10]);
        }


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
