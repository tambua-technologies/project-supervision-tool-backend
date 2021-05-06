<?php

use Illuminate\Database\Seeder;

class SubProjectContractsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_contracts')->delete();

        \DB::table('sub_project_contracts')->insert(array (
            0 =>
            array (
                'name' => 'Road Construction',
                'contract_no' => 'LGA/017/2015-2016/W/102',
                'procuring_entity_package_id' => 1,
                'contract_cost_id' => 1,
                'contract_time_id' => 1,
                'contractor_id' => 10,
                'created_at' => '2021-05-06 11:25:11',
                'updated_at' => '2021-05-06 11:25:11',
                'deleted_at' => NULL,
            ),
        ));


    }
}
