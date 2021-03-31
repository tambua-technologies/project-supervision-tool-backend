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
                'created_at' => '2021-03-30 18:55:49',
                'updated_at' => '2021-03-30 18:55:49',
                'deleted_at' => NULL,
            ),
        ));


    }
}
