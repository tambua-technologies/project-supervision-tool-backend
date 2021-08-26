<?php

use Illuminate\Database\Seeder;

class PackageContractStaffsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('package_contract_staffs')->delete();

        \DB::table('package_contract_staffs')->insert(array (
            0 =>
            array (
                'first_name' => 'Wang',
                'last_name' => 'Guofu',
                'remarks' => 'Available at site',
                'position_id' => 1,
                'procuring_entity_package_contract_id' => 1,
                'created_at' => '2021-08-14 14:52:35',
                'updated_at' => '2021-08-14 14:52:35',
                'deleted_at' => NULL,
            ),
        ));


    }
}
