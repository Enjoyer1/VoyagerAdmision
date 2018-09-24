<?php


use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Curso;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CursosTableSeeder extends Seeder
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
      | Cursos
      |--------------------------------------------------------------------------
      */

        //dataty seeeder
        $dataType = $this->dataType('slug', 'cursos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'cursos',
                'display_name_singular' => 'Curso',
                'display_name_plural' => 'Cursos',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Curso',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        //datarow seeder
        $cursoDataType = DataType::where('slug', 'cursos')->firstOrFail();


        $dataRow = $this->dataRow($cursoDataType, 'id');
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

        $dataRow = $this->dataRow($cursoDataType, 'nombre');
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

        $dataRow = $this->dataRow($cursoDataType, 'curso_hasmany_estudiante_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => 'Colegios',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"model":"App\\\Estudiante","table":"estudiantes","type":"hasMany","column":"curso_id","key":"id","label":"nombre","pivot_table":"estudiantes","pivot":"0"}',
                'order' => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($cursoDataType, 'created_at');
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
                'order' => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($cursoDataType, 'updated_at');
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
                'order' => 5,
            ])->save();
        }
    //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => ('Cursos'),
            'url' => '',
            'route' => 'voyager.cursos.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => null,
                'parent_id' => null,
                'order' => 13,
            ])->save();
        }

        //Permissions
        Permission::generateFor('cursos');

        // cities seeder

        DB::table('cursos')->insert([
            'nombre' => '2º Medio'
        ]);
        DB::table('cursos')->insert([
            'nombre' => '3º Medio'
        ]);
        DB::table('cursos')->insert([
            'nombre' => '4º Medio'
        ]);


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
