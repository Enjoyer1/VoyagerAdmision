<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Pasantia;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PasantiasTableSeeder extends Seeder
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
      | Pasantias
      |--------------------------------------------------------------------------
      */

        //datatype seeder
        $dataType = $this->dataType('slug', 'pasantias');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'pasantias',
                'display_name_singular' => 'Pasantia',
                'display_name_plural' => 'Pasantias',
                'icon' => 'voyager-study',
                'model_name' => 'App\\Pasantia',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => 'Pasantias de los Alumnos',
            ])->save();
        }

        //datarow seeder
        $pasantiaDataType = DataType::where('slug', 'pasantias')->firstOrFail();

        $dataRow = $this->dataRow($pasantiaDataType, 'id');
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

        $dataRow = $this->dataRow($pasantiaDataType, 'nombre');
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
        $dataRow = $this->dataRow($pasantiaDataType, 'fecha');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'date',
                'display_name' => 'Fecha',
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

        $dataRow = $this->dataRow($pasantiaDataType, 'cupos');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Cupos',
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
        $dataRow = $this->dataRow($pasantiaDataType, 'campus');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Campus',
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

        $dataRow = $this->dataRow($pasantiaDataType, 'estado');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Estado',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{    "default": "Pendiente",    "options": {        "Pendiente": "Pendiente",        "Realizada": "Realizada",        "Cancelada": "Cancelada"    }}',
                'order' => 6,
            ])->save();
        }
        $dataRow = $this->dataRow($pasantiaDataType, 'carrera_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Carrera Id',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($pasantiaDataType, 'created_at');
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
                'order' => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($pasantiaDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Actualizado en',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($pasantiaDataType, 'pasantia_belongsto_carrera_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Carrera',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\Colegio","table":"colegios","type":"belongsTo","column":"colegio_id","key":"id","label":"nombre","pivot_table":"estudiantes","pivot":"0"}',
                'order' => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($pasantiaDataType, 'pasantia_belongstomany_estudiante_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Estudiantes',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => '{"model":"App\\\Estudiante","table":"estudiantes","type":"belongsToMany","column":"id","key":"id","label":"nombre","pivot_table":"preferencias","pivot":"1","taggable":"0"}',
                'order' => 11,
            ])->save();
        }


        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => ('Pasantias'),
            'url' => '',
            'route' => 'voyager.pasantias.index',
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
        Permission::generateFor('pasantias');

        // pasantias seeder
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            Pasantia::create([
                'id_pasantia' => $faker->unique()->numberBetween((100), (100000)),
                'nombre' => $faker->unique()->domainName,
                'correo_encargado' => $faker->email,
                'created_at' => '2018-09-19 19:48:10',
                'updated_at' => '2018-09-19 19:48:10',

            ]);
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
