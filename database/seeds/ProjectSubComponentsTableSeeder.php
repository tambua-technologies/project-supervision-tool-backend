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
                'id' => 1,
                'name' => 'quam',
                'description' => 'Quo debitis consequatur non eveniet et voluptatum quibusdam. Aut distinctio rerum cumque molestiae voluptatem. Veniam qui et quia magnam consequatur.',
                'project_component_id' => 2,
                'created_at' => '2021-03-30 18:55:49',
                'updated_at' => '2021-03-30 18:55:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}