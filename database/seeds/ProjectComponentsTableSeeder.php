<?php

use Illuminate\Database\Seeder;

class ProjectComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('project_components')->delete();

        \DB::table('project_components')->insert(array (
            0 =>
            array (
                'name' => 'Priority Infrastructure',
                'description' => 'Priority Infrastructure',
                'project_id' => 'P123134',
                'created_at' => '2021-03-31 14:29:32',
                'updated_at' => '2021-03-31 14:29:32',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Upgrading in Low Income Communities',
                'description' => 'Upgrading in Low Income Communities',
                'project_id' => 'P123134',
                'created_at' => '2021-03-31 14:29:32',
                'updated_at' => '2021-03-31 14:29:32',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Institutional Strengthening',
                'description' => 'Institutional Strengthening',
                'project_id' => 'P123134',
                'created_at' => '2021-03-31 14:29:32',
                'updated_at' => '2021-03-31 14:29:32',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'Implementation Support and Monitoring and Evaluation',
                'description' => 'Implementation Support and Monitoring and Evaluation',
                'project_id' => 'P123134',
                'created_at' => '2021-03-31 14:29:32',
                'updated_at' => '2021-03-31 14:29:32',
                'deleted_at' => NULL,
            ),
        ));


    }
}
