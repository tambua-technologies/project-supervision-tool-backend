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
            )
        ));
    }
}
