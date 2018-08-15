<?php


use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Ciudad;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CiudadesTableSeeder extends Seeder
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
      | Ciudades
      |--------------------------------------------------------------------------
      */

        //dataty seeeder
        $dataType = $this->dataType('slug', 'ciudades');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'ciudades',
                'display_name_singular' => 'Ciudad',
                'display_name_plural'   => 'Ciudades',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Ciudad',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //datarow seeder
        $ciudadDataType = DataType::where('slug', 'ciudades')->firstOrFail();


        $dataRow = $this->dataRow($ciudadDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
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

        $dataRow = $this->dataRow($ciudadDataType, 'nombre');
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
        $dataRow = $this->dataRow($ciudadDataType, 'nombre_region');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Región',
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


        $menu = Menu::where('name', 'admin')->firstOrFail();

        $locationMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => ('Locaciones'),
            'url'     => '',

        ]);
        if (!$locationMenuItem->exists) {
            $locationMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => ('Ciudades'),
            'url'     => '',
            'route'   => 'voyager.ciudades.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $locationMenuItem->id,
                'order'      => 16,
            ])->save();
        }

        //Permissions
        Permission::generateFor('ciudades');

        // cities seeder
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('ciudades')->insert([
                'nombre' => $faker->city,
                'nombre_region' => $faker->country,

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
