<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Carrera;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarrerasTableSeeder extends Seeder
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
      | Carrerras
      |--------------------------------------------------------------------------
      */

            //datatype seeder
            $dataType = $this->dataType('slug', 'carreras');
            if (!$dataType->exists) {
                $dataType->fill([
                    'name' => 'carreras',
                    'display_name_singular' => 'Carrera',
                    'display_name_plural' => 'Carreras',
                    'icon' => 'voyager-study',
                    'model_name' => 'App\\Carrera',
                    'controller' => '',
                    'generate_permissions' => 1,
                    'description' => 'Carreras de los Alumnos',
                ])->save();
            }

            //datarow seeder
            $carreraDataType = DataType::where('slug', 'carreras')->firstOrFail();

            $dataRow = $this->dataRow($carreraDataType, 'id');
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
        $dataRow = $this->dataRow($carreraDataType, 'id_carrera');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Código Carrera',
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
            $dataRow = $this->dataRow($carreraDataType, 'nombre');
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
                    'order' => 3,
                ])->save();
            }
            $dataRow = $this->dataRow($carreraDataType, 'correo_encargado');
            if (!$dataRow->exists) {
                $dataRow->fill([
                    'type' => 'text',
                    'display_name' => 'Correo Encargado',
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


            $dataRow = $this->dataRow($carreraDataType, 'created_at');
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
                    'order' => 5,
                ])->save();
            }

            $dataRow = $this->dataRow($carreraDataType, 'updated_at');
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
                    'order' => 6,
                ])->save();
            }
        $dataRow = $this->dataRow($carreraDataType, 'carrera_belongstomany_estudiante_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Estudiantes',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => '{"model":"App\\\Estudiante","table":"estudiantes","type":"belongsToMany","column":"id","key":"id","label":"nombre","pivot_table":"preferencias","pivot":"1","taggable":"0"}',
                'order'        => 7,
            ])->save();
        }


            //Menu Item
            $menu = Menu::where('name', 'admin')->firstOrFail();
            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => ('Carreras'),
                'url' => '',
                'route' => 'voyager.carreras.index',
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
            Permission::generateFor('carreras');

            // carreras seeder
            $faker = Faker::create();
            foreach (range(1, 20) as $index) {
                Carrera::create([
                    'id_carrera' => $faker->unique()->numberBetween((100), (100000)),
                    'nombre' => $faker->unique()->domainName,
                    'correo_encargado' => $faker->email,
                    'created_at'=>'2018-09-19 19:48:10',
                    'updated_at'=>'2018-09-19 19:48:10',

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
