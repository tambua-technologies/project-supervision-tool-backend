<?php

use Illuminate\Database\Seeder;

class ContractCostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contract_costs')->delete();

        \DB::table('contract_costs')->insert(array (
            0 =>
            array (
                'contract_award_value_id' => 11,
                'certified_work_to_date_value_id' => 12,
                'works_certified_to_date_percentage' => '13',
                'financial_penalties_applied_value_id' => 14,
                'financial_penalties_granted_value_id' => 15,
                'variations_granted_value_id' => 16,
                'variations_applied_not_yet_granted_value_id' => 17,
                'estimated_final_contract_price_id' => 18,
                'created_at' => '2021-05-06 11:41:25',
                'updated_at' => '2021-05-06 11:41:25',
                'deleted_at' => NULL,
            ),
        ));


    }
}
