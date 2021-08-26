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

        \DB::table('procuring_entity_packages')->insert(array (
            0 =>
            array (
                'name' => 'Package 4',
                'description' => 'Package 4',
                'procuring_entity_id' => 1,
                'project_component_id' => null,
                'project_sub_component_id' => null,
            )
        ));
    }
}
