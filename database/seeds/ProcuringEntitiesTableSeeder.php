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
                'project_id' => 1,
                'agency_id' => 12,
                'project_sub_component_id' => 1,
            ),
            1 =>
            array (
                'project_id' => 1,
                'agency_id' => 13,
                'project_sub_component_id' => 1,
            ),
            2 =>
            array (
                'project_id' => 1,
                'agency_id' => 14,
                'project_sub_component_id' => 1,
            ),
            3 =>
            array (
                'project_id' => 1,
                'agency_id' => 12,
                'project_sub_component_id' => 2,
            ),
            4 =>
            array (
                'project_id' => 1,
                'agency_id' => 13,
                'project_sub_component_id' => 2,
            ),
            5 =>
            array (
                'project_id' => 1,
                'agency_id' => 14,
                'project_sub_component_id' => 2,
            ),
            6 =>
            array (
                'project_id' => 1,
                'agency_id' => 12,
                'project_sub_component_id' => 4,
            ),
            7 =>
            array (
                'project_id' => 1,
                'agency_id' => 13,
                'project_sub_component_id' => 5,
            ),
            8 =>
            array (
                'project_id' => 1,
                'agency_id' => 14,
                'project_sub_component_id' => 6,
            ),
            9 =>
            array (
                'project_id' => 1,
                'agency_id' => 3,
                'project_sub_component_id' => 7,
            ),
            10 =>
            array (
                'project_id' => 1,
                'agency_id' => 3,
                'project_sub_component_id' => 9,
            ),
            11 =>
            array (
                'project_id' => 1,
                'agency_id' => 3,
                'project_sub_component_id' => 10,
            ),
            12 =>
            array (
                'project_id' => 1,
                'agency_id' => 3,
                'project_sub_component_id' => 11,
            ),
            13 =>
            array (
                'project_id' => 1,
                'agency_id' => 3,
                'project_sub_component_id' => 13,
            ),
        ));


    }
}
