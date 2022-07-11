<?php

use Illuminate\Database\Seeder;

class SafeguardConcernsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('safeguard_concerns')->delete();

        \DB::table('safeguard_concerns')->insert(array(
            0 =>
                array(

                    'package_id' => 1,
                    'procuring_entity_id' => 1,
                    'sub_project_id' => 5,
                    'concern_type' => 'healthy and safety',
                    'issue' => 'Safety trainings',
                    'description' => NULL,
                    'commitment' => 'Toolbox meetings and general safety awareness',
                    'steps_taken' => 'Toolbox meeting are offered on daily basis',
                    'challenges' => NULL,
                    'mitigation_measures' => NULL,
                    'way_forward' => NULL,
                    'created_at' => '2022-07-11 08:43:57',
                    'updated_at' => '2022-07-11 08:43:57',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(

                    'package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_id' => 1,
                    'concern_type' => 'social',
                    'issue' => 'Employment',
                    'description' => NULL,
                    'commitment' => 'About 148 Labours have been employed.',
                    'steps_taken' => 'All employees provided with employment contracts.',
                    'challenges' => 'No cases among labours',
                    'mitigation_measures' => 'n/a',
                    'way_forward' => 'n/a',
                    'created_at' => '2022-07-11 08:43:58',
                    'updated_at' => '2022-07-11 08:43:58',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(

                    'package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_id' => 2,
                    'concern_type' => 'environmental',
                    'issue' => 'Noise and vibration abatement',
                    'description' => 'The source of noise and vibration in this project: heavy trucks, batch plant, machines (welding machines, excavator machine producing electricity and wheel loader)',
                    'commitment' => 'High-intensity impact noise and vibration were dedicated to daytime',
                    'steps_taken' => 'complied',
                    'challenges' => 'No associated impact were raised during this month.',
                    'mitigation_measures' => 'n/a',
                    'way_forward' => 'n/a',
                    'created_at' => '2022-07-11 08:43:58',
                    'updated_at' => '2022-07-11 08:43:58',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
