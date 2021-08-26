<?php

use Illuminate\Database\Seeder;

class PackageContractFinancialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('package_contract_financials')->delete();

        \DB::table('package_contract_financials')->insert(array (
            0 =>
            array (
                'package_contract_id' => 1,
                'invoice_no' => 1,
                'particulars' => 'Advance amount',
                'amount' => '{"amount": 2811039244.89, "currency": "TSH"}',
                'remarks' => 'Certified and Paid',
                'created_at' => '2021-08-14 19:54:11',
                'updated_at' => '2021-08-14 19:54:11',
                'deleted_at' => NULL,
            ),
        ));


    }
}
