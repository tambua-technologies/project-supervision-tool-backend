<?php

use Illuminate\Database\Seeder;

class ProcuredProjectComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('procured_project_components')->delete();
        
        \DB::table('procured_project_components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_component_id' => 1,
                'procuring_entity_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}