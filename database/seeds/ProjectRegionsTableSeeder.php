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
                'id' => 1,
                'project_id' => 'P123134',
                'region_id' => 'TZ07',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}