<?php

use Illuminate\Database\Seeder;

class ProcuringEntityPackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entity_packages')->delete();

        \DB::table('procuring_entity_packages')->insert(array(
            0 =>
                array(
                    'name' => 'Package 5',
                    'description' => 'Kizinga River (TE4)',
                    'procuring_entity_id' => 1,
                    'project_component_id' => NULL,
                    'project_sub_component_id' => NULL,
                    'created_at' => '2022-07-11 08:40:08',
                    'updated_at' => '2022-07-11 08:40:08',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'name' => 'Package 4',
                    'description' => 'Gerezani Creek (TE2; TE3; TE9)',
                    'procuring_entity_id' => 1,
                    'project_component_id' => NULL,
                    'project_sub_component_id' => NULL,
                    'created_at' => '2022-07-11 08:40:08',
                    'updated_at' => '2022-07-11 08:40:08',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
