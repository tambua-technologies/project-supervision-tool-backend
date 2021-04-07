<?php

use Illuminate\Database\Seeder;

class ProjectSubComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('project_sub_components')->delete();

        \DB::table('project_sub_components')->insert(array (
            0 =>
            array (
                'name' => 'Priority Roads',
                'description' => 'Priority Roads',
                'project_component_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Flood Control and Storm Water Drainage',
                'description' => 'Flood Control and Storm Water Drainage',
                'project_component_id' => 1,
            ),
            2 =>
            array (
                'name' => 'Contingency for Disaster Risk Response',
                'description' => 'Contingency for Disaster Risk Response',
                'project_component_id' => 1,
            ),
            3 =>
            array (
                'name' => 'Kinondoni MC',
                'description' => 'Kinondoni MC',
                'project_component_id' => 2,
            ),
            4 =>
            array (
                'name' => 'Ilala MC',
                'description' => 'Ilala MC',
                'project_component_id' => 2,
            ),
            5 =>
            array (
                'name' => 'Temeke MC',
                'description' => 'Temeke MC',
                'project_component_id' => 1,
            ),
            6 =>
            array (
                'name' => 'Solid Waste Equipment',
                'description' => 'Solid Waste Equipment',
                'project_component_id' => 2,
            ),
            7 =>
            array (
                'name' => 'Improving Metropolitan Governance Arrangement and Systems',
                'description' => 'Improving Metropolitan Governance Arrangement and Systems',
                'project_component_id' => 3,
            ),
            8 =>
            array (
                'name' => 'Improving Local Government Revenue Collection Systems and Mainstreaming Geographic Information Systems',
                'description' => 'Improving Local Government Revenue Collection Systems and Mainstreaming Geographic Information Systems',
                'project_component_id' => 3,
            ),
            9 =>
            array (
                'name' => 'Support for Integrated Transport and Land-use Planning',
                'description' => 'Support for Integrated Transport and Land-use Planning',
                'project_component_id' => 3,
            ),
            10 =>
            array (
                'name' => 'Strengthening Operations and Maintenance Systems',
                'description' => 'Strengthening Operations and Maintenance Systems',
                'project_component_id' => 3,
            ),
            11 =>
            array (
                'name' => 'Urban Analytics',
                'description' => 'Urban Analytics',
                'project_component_id' => 3,
            ),
            12 =>
            array (
                'name' => 'Urban Planning Systems',
                'description' => 'Urban Planning Systems',
                'project_component_id' => 3,
            ),
        ));


    }
}
