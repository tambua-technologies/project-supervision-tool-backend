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
                'id' => 1,
                'name' => 'accusantium',
                'description' => 'Doloribus vel recusandae neque dolor repellendus deserunt. Et aut ea autem voluptas et quia eveniet. Repellendus amet molestiae atque vitae. Sit quod et explicabo quis.',
                'project_id' => 'hulda.wolf',
                'created_at' => '2021-03-28 14:13:48',
                'updated_at' => '2021-03-28 14:13:48',
            ),
        ));
        
        
    }
}