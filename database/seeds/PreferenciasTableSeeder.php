<?php


use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use App\Preferencia;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PreferenciasTableSeeder extends Seeder
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
      | Preferencias
      |--------------------------------------------------------------------------
      */

        //dataty seeeder
        $dataType = $this->dataType('slug', 'preferencias');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'preferencias',
                'display_name_singular' => 'Preferencia',
                'display_name_plural' => 'Preferencias',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Preferencia',
                'controller' => '',
                'generate_permissions' => 0,
                'description' => '',
            ])->save();
        }

        //datarow seeder
        $preferenciaDataType = DataType::where('slug', 'preferencias')->firstOrFail();


        $dataRow = $this->dataRow($preferenciaDataType, 'id');
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

        $dataRow = $this->dataRow($preferenciaDataType, 'estudiante_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'estudiante id',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => '',
                'order' => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($preferenciaDataType, 'carrera_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Carrera',
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


        $dataRow = $this->dataRow($preferenciaDataType, 'posicion');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'posición',
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

        $dataRow = $this->dataRow($preferenciaDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Creado en',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($preferenciaDataType, 'updated_at');
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
                'order' => 7,
            ])->save();
        }
        //Permissions
        Permission::generateFor('preferencias');

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
