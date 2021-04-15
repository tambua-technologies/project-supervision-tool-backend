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
                'project_sub_component_id' => 1,
            ),
            1 =>
            array (
                'agency_id' => 13,
                'project_sub_component_id' => 1,
            ),
            2 =>
            array (
                'agency_id' => 14,
                'project_sub_component_id' => 1,
            ),
            3 =>
            array (
                'agency_id' => 12,
                'project_sub_component_id' => 2,
            ),
            4 =>
            array (
                'agency_id' => 13,
                'project_sub_component_id' => 2,
            ),
            5 =>
            array (
                'agency_id' => 14,
                'project_sub_component_id' => 2,
            ),
            6 =>
            array (
                'agency_id' => 12,
                'project_sub_component_id' => 4,
            ),
            7 =>
            array (
                'agency_id' => 13,
                'project_sub_component_id' => 5,
            ),
            8 =>
            array (
                'agency_id' => 14,
                'project_sub_component_id' => 6,
            ),
            9 =>
            array (
                'agency_id' => 3,
                'project_sub_component_id' => 7,
            ),
            10 =>
            array (
                'agency_id' => 3,
                'project_sub_component_id' => 9,
            ),
            11 =>
            array (
                'agency_id' => 3,
                'project_sub_component_id' => 10,
            ),
            12 =>
            array (
                'agency_id' => 3,
                'project_sub_component_id' => 11,
            ),
            13 =>
            array (
                'agency_id' => 3,
                'project_sub_component_id' => 13,
            ),
        ));


    }
}
