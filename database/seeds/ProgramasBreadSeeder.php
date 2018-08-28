<?php

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use TCG\Voyager\Models\Permission;

class ProgramasBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'programas',
            'display_name_singular' => 'Programa',
            'display_name_plural'   => 'Programas',
            'icon'                  => '',
            'model_name'            => 'App\Programa',
            'controller'            => '',
            'generate_permissions'  => 1,
            'description'           => '',
        ];
    }

    public function inputFields()
    {
        return [
            'id' => [
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
            ],
            'nombre' => [
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
            ],
            'descripción' => [
                'type' => 'text_are',
                'display_name' => 'Descripción',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 3,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'display_name' => 'created_at',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 4,
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'display_name' => 'updated_at',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 5,
            ]
        ];
    }
    public function menuEntry()
    {
        return [
            'role'      => 'admin',
            'title'      => 'Programas',
            'url'        => '',
            'route'      => 'voyager.programas.index',
            'target'     => '_self',
            'icon_class' => 'voyager-basket',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 13,
        ];
    }
    public function run()
    {
        // cities seeder
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('programas')->insert([
                'nombre' => $faker->domainName,
                'descripción' => $faker->text,

            ]);
        }

        //Permissions
        Permission::generateFor('programas');

    }




}
