<?php

use Illuminate\Database\Seeder;

class SubProjectTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_types')->delete();

        \DB::table('sub_project_types')->insert(array (
            0 =>
            array (
                'name' => 'Road',
                'description' => 'Road',
                'unit_id' => 5,
                'created_at' => '2021-04-05 14:06:56',
                'updated_at' => '2021-04-05 14:06:56',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Park',
                'description' => 'Park',
                'unit_id' => 2,
                'created_at' => '2021-04-05 14:06:56',
                'updated_at' => '2021-04-05 14:06:56',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'SWM Infrastructure',
                'description' => 'SWM Infrastructure',
                'unit_id' => 5,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'Health Care Facility',
                'description' => 'Health Care Facility',
                'unit_id' => 3,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'Pedestrian Path',
                'description' => 'Pedestrian Path',
                'unit_id' => 4,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'name' => 'Drainage',
                'description' => 'Drainage',
                'unit_id' => 3,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'name' => 'Market',
                'description' => 'Market',
                'unit_id' => 2,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'name' => 'Bus Stand',
                'description' => 'Public Toilet',
                'unit_id' => 5,
                'created_at' => '2021-04-05 14:06:57',
                'updated_at' => '2021-04-05 14:06:57',
                'deleted_at' => NULL,
            ),
        ));


    }
}
