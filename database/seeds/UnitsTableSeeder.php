<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('units')->delete();

        \DB::table('units')->insert(array (
            0 =>
            array (
                'name' => 'Kilometer',
                'description' => 'Kilometer',
                'code' => 'km',
                'created_at' => '2021-04-05 14:52:44',
                'updated_at' => '2021-04-05 14:52:44',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'square kilometer',
                'description' => 'square kilometer',
                'code' => 'km2',
                'created_at' => '2021-04-05 14:52:44',
                'updated_at' => '2021-04-05 14:52:44',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'meter',
                'description' => 'm',
                'code' => 'm',
                'created_at' => '2021-04-05 14:52:44',
                'updated_at' => '2021-04-05 14:52:44',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'square meter',
                'description' => 'square meter',
                'code' => 'm2',
                'created_at' => '2021-04-05 14:52:44',
                'updated_at' => '2021-04-05 14:52:44',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'cubic meter',
                'description' => 'cubic meter',
                'code' => 'm3',
                'created_at' => '2021-04-05 14:52:44',
                'updated_at' => '2021-04-05 14:52:44',
                'deleted_at' => NULL,
            ),
        ));


    }
}
