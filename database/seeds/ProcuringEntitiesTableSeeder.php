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
                'agency_id' => 12,
                'project_id' => 1,
                'created_at' => '2021-06-28 11:14:53',
                'updated_at' => '2021-06-28 11:14:53',
                'deleted_at' => NULL,
            )
        ));
    }
}
