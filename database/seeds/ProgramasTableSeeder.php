<?php


use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Programa;
use Faker\Factory as Faker;

class ProgramasTableSeeder extends Seeder
{
    public function run()
    {

        /*
          |--------------------------------------------------------------------------
          | Programas
          |--------------------------------------------------------------------------
          */
        $dataType = $this->dataType('slug', 'programas');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'programas',
                'display_name_singular' => 'Programa',
                'display_name_plural'   => 'Programas',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Programa',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //datarow seeder
        $programaDataType = DataType::where('slug', 'programas')->firstOrFail();


        $dataRow = $this->dataRow($programaDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'hidden',
                'display_name' => 'Id',
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

        $dataRow = $this->dataRow($programaDataType, 'nombre');
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
        $dataRow = $this->dataRow($programaDataType, 'descripcion');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text_area',
                'display_name' => 'Descripción',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($programaDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Creado en',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($programaDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Actualizado en',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 5,
            ])->save();
        }
/*
        $dataRow = $this->dataRow($programaDataType, 'programa_belongstomany_colegio_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Programas',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => '{"model":App\\\Colegio","table":"colegios","type":"belongsToMany","column":"id","key":"id","label":"nombre","pivot_table":"colegio_programa","pivot":"1","taggable":"0"}',
                'order'        => 6,
            ])->save();
        }

*/
        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => ('Programas'),
            'url'     => '',
            'route'   => 'voyager.programas.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }


        //Permissions
        Permission::generateFor('programas');

        // cities seeder


        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Programa::create([
                'nombre' => $faker->jobTitle,
                'descripcion' => $faker->text,

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
