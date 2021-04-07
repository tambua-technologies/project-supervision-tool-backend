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
                'name' => 'Package 1',
                'description' => 'Package 1',
                'procuring_entity_id' => 1,
                'created_at' => '2021-03-31 14:42:50',
                'updated_at' => '2021-03-31 14:42:50',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Package 2',
                'description' => 'Package 2',
                'procuring_entity_id' => 1,
                'created_at' => '2021-03-31 14:42:50',
                'updated_at' => '2021-03-31 14:42:50',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Package 3',
                'description' => 'Package 3',
                'procuring_entity_id' => 1,
                'created_at' => '2021-03-31 14:42:50',
                'updated_at' => '2021-03-31 14:42:50',
                'deleted_at' => NULL,
            ),
        ));


    }
}
