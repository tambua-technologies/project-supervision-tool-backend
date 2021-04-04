<?php

use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('project_statuses')->delete();

        \DB::table('project_statuses')->insert(array (
            0 =>
            array (
                'name' => 'active',
                'description' => 'active',
            ),
            1 =>
            array (
                'name' => 'closed',
                'description' => 'closed',
            ),
            2 =>
            array (
                'name' => 'dropped',
                'description' => 'dropped'
            ),
        ));


    }
}
