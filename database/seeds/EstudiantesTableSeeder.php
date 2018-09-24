<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Estudiante;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EstudiantesTableSeeder extends Seeder
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
      | Estudiantes
      |--------------------------------------------------------------------------
      */

        //datatype seeder
        $dataType = $this->dataType('slug', 'estudiantes');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'estudiantes',
                'display_name_singular' => 'Estudiante',
                'display_name_plural' => 'Estudiantes',
                'icon' => 'voyager-study',
                'model_name' => 'App\\Estudiante',
                'controller' => '\App\Http\Controllers\Voyager\EstudiantesController',
                'generate_permissions' => 1,
                'description' => 'Estudiantes de los Alumnos',
                'server_side' => '1',
            ])->save();
        }

        //datarow seeder
        $estudianteDataType = DataType::where('slug', 'estudiantes')->firstOrFail();

        $dataRow = $this->dataRow($estudianteDataType, 'id');
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

        $dataRow = $this->dataRow($estudianteDataType, 'nombre');
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
        $dataRow = $this->dataRow($estudianteDataType, 'apellido1');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Apellido',
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

        $dataRow = $this->dataRow($estudianteDataType, 'apellido2');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Apellido',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'genero');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'radio_btn',
                'display_name' => 'Género',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{    "default" : "Femenino",    "options" : {        "Femenino": "Femenino",        "Masculino": "Masculino"    }}',
                'order' => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'RUN');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'RUN',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 6,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Email',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 7,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'celular');
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
                'order' => 8,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'curso_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Curso',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 9,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'colegio_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Colegios',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 10,
            ])->save();
        }



        $dataRow = $this->dataRow($estudianteDataType, 'created_at');
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
                'order' => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($estudianteDataType, 'updated_at');
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
                'order' => 12,
            ])->save();
        }

        $dataRow = $this->dataRow($estudianteDataType, 'estudiante_belongsto_colegio_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'colegio',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Colegio","table":"colegios","type":"belongsTo","column":"colegio_id","key":"id","label":"nombre","pivot_table":"estudiantes","pivot":"0"}',
                'order' => 13,
            ])->save();
        }
        $dataRow = $this->dataRow($estudianteDataType, 'estudiante_belongsto_curso_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Curso',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Curso","table":"cursos","type":"belongsTo","column":"curso_id","key":"id","label":"nombre","pivot_table":"estudiantes","pivot":"0"}',
                'order' => 14,
            ])->save();
        }



        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => ('Estudiantes'),
            'url' => '',
            'route' => 'voyager.estudiantes.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => null,
                'parent_id' => null,
                'order' => 9,
            ])->save();
        }

        //Permissions
        Permission::generateFor('estudiantes');

        //estudiantes seed
        $faker = Faker::create();
        foreach (range(1,100 ) as $index) {
            Estudiante::create([
                'nombre' => $faker->name,
                'apellido1' => $faker->lastName,
                'apellido2' => $faker->lastName,
                'genero' => 'Masculino',
                'RUN' => $faker->bankAccountNumber,
                'email' => $faker->email,
                'celular' => $faker->phoneNumber,
                'curso_id' => $faker->numberBetween((1), (3)),
                'colegio_id' => $faker->numberBetween((1), (20)),
                'created_at'=>'2018-09-19 19:48:10',
                'updated_at'=>'2018-09-19 19:48:10',

            ])->carreras()->attach([random_int(1,7)=>['posicion'=>'1'],random_int(8,13)=>['posicion'=>'2'],random_int(13,20)=>['posicion'=>'3']]);

        }

        foreach (range(1,100 ) as $index) {
            Estudiante::create([
                'nombre' => $faker->name,
                'apellido1' => $faker->lastName,
                'apellido2' => $faker->lastName,
                'genero' => 'Femenino',
                'RUN' => $faker->bankAccountNumber,
                'email' => $faker->unique()->email,
                'celular' => $faker->phoneNumber,
                'curso_id' => $faker->numberBetween((1), (3)),
                'colegio_id' => $faker->numberBetween((1), (40)),
                'created_at'=>'2018-09-19 19:48:10',
                'updated_at'=>'2018-09-19 19:48:10',

            ])->carreras()->attach([random_int(1,7)=>['posicion'=>'1'],random_int(8,13)=>['posicion'=>'2'],random_int(13,20)=>['posicion'=>'3']]);
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
