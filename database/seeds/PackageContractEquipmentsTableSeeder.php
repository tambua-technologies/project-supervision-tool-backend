<?php

use Illuminate\Database\Seeder;

class PackageContractEquipmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('package_contract_equipments')->delete();

        \DB::table('package_contract_equipments')->insert(array(
            0 =>
                array(
                    'package_contract_id' => 1,
                    'equipment_name' => 'Bulldozer 150 kW capacity with ripper',
                    'quantity_as_per_contract' => 3,
                    'mobilized' => 3,
                    'total_available_now' => 3,
                    'status_of_equipment' => 'Mobilized(No longer in use)',
                    'created_at' => '2021-08-14 17:53:03',
                    'updated_at' => '2021-08-14 17:53:03',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
