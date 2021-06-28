<?php

use Illuminate\Database\Seeder;

class ProcuringEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entities')->delete();

        \DB::table('procuring_entities')->insert(array (
            0 =>
            array (
                'agency_id' => 12,
                'project_id' => 1,
                'project_sub_component_id' => 1,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:14:53',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'agency_id' => 13,
                'project_id' => 1,
                'project_sub_component_id' => 1,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:15:03',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'agency_id' => 14,
                'project_id' => 1,
                'project_sub_component_id' => 1,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:15:20',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'agency_id' => 12,
                'project_id' => 1,
                'project_sub_component_id' => 2,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:15:37',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'agency_id' => 13,
                'project_id' => 1,
                'project_sub_component_id' => 2,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:15:47',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'agency_id' => 14,
                'project_id' => 1,
                'project_sub_component_id' => 2,
                'project_component_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:15:57',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'agency_id' => 12,
                'project_id' => 1,
                'project_sub_component_id' => 4,
                'project_component_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:16:11',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'agency_id' => 13,
                'project_id' => 1,
                'project_sub_component_id' => 5,
                'project_component_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:16:23',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'agency_id' => 3,
                'project_id' => 1,
                'project_sub_component_id' => 7,
                'project_component_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:17:05',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'agency_id' => 3,
                'project_id' => 1,
                'project_sub_component_id' => 9,
                'project_component_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:17:43',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'agency_id' => 3,
                'project_id' => 1,
                'project_sub_component_id' => 10,
                'project_component_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:17:59',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'agency_id' => 3,
                'project_id' => 1,
                'project_sub_component_id' => 11,
                'project_component_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:18:10',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'agency_id' => 3,
                'project_id' => 1,
                'project_sub_component_id' => 13,
                'project_component_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:18:25',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'agency_id' => 14,
                'project_id' => 1,
                'project_sub_component_id' => 7,
                'project_component_id' => 2,
                'created_at' => NULL,
                'updated_at' => '2021-06-28 11:20:08',
                'deleted_at' => NULL,
            ),
        ));


    }
}
