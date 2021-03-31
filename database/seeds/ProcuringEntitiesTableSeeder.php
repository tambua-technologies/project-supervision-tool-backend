<?php

use Illuminate\Database\Seeder;

class ProcuringEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entities')->delete();

        \DB::table('procuring_entities')->insert(array (
            0 =>
            array (
                'agency_id' => 8,
                'project_sub_component_id' => 1,
                'created_at' => '2021-03-31 14:38:30',
                'updated_at' => '2021-03-31 14:38:30',
                'deleted_at' => NULL,
            ),
        ));


    }
}
