<?php

use Illuminate\Database\Seeder;

class ProcuringEntityPackageContractsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('procuring_entity_package_contracts')->delete();

        \DB::table('procuring_entity_package_contracts')->insert(array(

            0 =>
                array(
                    'procuring_entity_package_id' => 1,
                    'contractor_id' => 14,
                    'name' => 'Package 4: Construction of Flood Control and Storm water Drainage System in Temeke Municipality: Gerezani Creek (TE3, TE9, TE2)',
                    'contract_no' => 'LGA/016/2018-2019/W/DMDP/02',
                    'original_contract_sum' => '{"amount": 18740981733, "currency": "TZS"}',
                    'addendum_amount_to_the_contract' => NULL,
                    'revised_contract_sum' => NULL,
                    'date_contract_agreement_signed' => '2019-06-03',
                    'date_of_commencement_of_works' => '2019-07-01',
                    'date_possession_of_site_given' => '2019-07-01',
                    'date_of_end_of_mobilization_period' => '2019-07-29',
                    'date_of_contract_completion' => '2020-09-30',
                    'revised_date_of_contract_completion' => '2021-06-30',
                    'defects_liability_notification_period' => '12',
                    'original_contract_period' => '0',
                    'revised_contract_period' => '0',
                    'actual_physical_progress' => '90',
                    'planned_physical_progress' => '95',
                    'financial_progress' => '49.25',
                    'created_at' => '2021-08-14 12:12:13',
                    'updated_at' => '2021-08-14 12:12:13',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
