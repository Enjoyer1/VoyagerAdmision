<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypes2TableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
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


    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
