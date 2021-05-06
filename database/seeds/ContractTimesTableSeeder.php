<?php

use Illuminate\Database\Seeder;

class ContractTimesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contract_times')->delete();

        \DB::table('contract_times')->insert(array (
            0 =>
            array (
                'start_date' => '1980-12-31 00:01:17',
                'original_contract_period' => '3',
                'defects_liability_period' => '1',
                'time_extension_granted' => '6',
                'time_extension_applied_not_yet_granted' => '8',
                'intended_completion_date' => '1976-11-03 18:30:28',
                'revised_completion_date' => '1998-02-24 09:08:27',
                'time_percentage_lapsed_to_date' => '6',
                'created_at' => '2021-05-06 11:42:18',
                'updated_at' => '2021-05-06 11:42:18',
                'deleted_at' => NULL,
            ),
        ));


    }
}
