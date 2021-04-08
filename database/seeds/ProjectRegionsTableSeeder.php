<?php

use Illuminate\Database\Seeder;

class ProjectRegionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('project_regions')->delete();

        \DB::table('project_regions')->insert(array (
            0 =>
            array (
                'project_id' => 'P123134',
                'region_id' => 'TZ07',
            ),
            1 =>
            array (
                'project_id' => 'P171189',
                'region_id' => 'TZ02',
            ),
            2 =>
            array (
                'project_id' => 'P165128',
                'region_id' => 'TZ54',
            ),
        ));


    }
}
