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
        ));


    }
}
