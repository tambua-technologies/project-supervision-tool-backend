<?php

use Illuminate\Database\Seeder;

class ProcuringEntityContractTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entity_contract')->delete();

        \DB::table('procuring_entity_contract')->insert(array (
            0 =>
            array (
                'procuring_entity_id' => 1,
            'name' => 'Construction Supervision of Infrastructure Components in Temeke Municipality Under the Dar es Salaam Metropolitan Development Project (DMDP)',
                'contract_no' => 'LGA/016/2014-2015/C/DMDP/01',
                'original_contract_sum' => '{"amount": 4265400, "currency": "USD"}',
                'revised_contract_sum' => '{"amount": 5962400, "currency": "USD"}',
                'original_signing_date' => '2016-04-18',
                'revised_signing_date' => '2016-06-01',
                'commencement_date' => '2016-06-01',
                'contract_period' => '73',
                'revised_end_date_of_contract' => '2022-06-30',
                'created_at' => '2021-08-08 11:36:34',
                'updated_at' => '2021-08-08 11:36:34',
                'deleted_at' => NULL,
            ),
        ));


    }
}
