<?php

use Illuminate\Database\Seeder;

class ProcuringEntityContractSupervisingConsultantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entity_contract_supervising_consultants')->delete();

        \DB::table('procuring_entity_contract_supervising_consultants')->insert(array (
            0 =>
            array (
                'procuring_entity_contract_id' => 1,
                'agency_id' => 8,
                'created_at' => '2021-08-12 08:58:11',
                'updated_at' => '2021-08-12 08:57:59',
            ),
            1 =>
            array (
                'procuring_entity_contract_id' => 1,
                'agency_id' => 9,
                'created_at' => '2021-08-12 08:59:23',
                'updated_at' => '2021-08-12 08:59:25',
            ),
        ));


    }
}
