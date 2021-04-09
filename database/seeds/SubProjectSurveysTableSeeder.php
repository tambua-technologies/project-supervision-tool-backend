<?php

use Illuminate\Database\Seeder;

class SubProjectSurveysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_surveys')->delete();

        \DB::table('sub_project_surveys')->insert(array (
            0 =>
            array (
                'survey_id' => 'avaVLs3NnAUVvF8gPcfwwY',
                'category_name' => 'road',
                'sub_project_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
