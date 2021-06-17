<?php

use Illuminate\Database\Seeder;

class SubProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_projects')->delete();

        \DB::table('sub_projects')->insert(array (
            0 =>
            array (

                'name' => 'Sokoni Makumbusho',
                'project_id' => 1,
                'code' => 'SM',
                'description' => 'Sokoni Makumbusho',
                'procuring_entity_package_id' => 1,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 2,
                'quantity' => 10,
            ),
            1 =>
            array (

                'name' => 'Tanesco-Soko la Samaki',
                'project_id' => 1,
                'code' => 'TSLS',
                'description' => 'Tanesco-Soko la Samaki',
                'procuring_entity_package_id' => 1,
                'sub_project_type_id' => 2,
                'sub_project_status_id' => 3,
                'quantity' => 50,
            ),
            2 =>
            array (

                'name' => 'Nzasa',
                'project_id' => 1,
                'code' => 'N',
                'description' => 'Nzasa',
                'procuring_entity_package_id' => 1,
                'quantity' => 30,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 2,
            ),
            3 =>
            array (

                'name' => 'MMK',
                'project_id' => 1,
                'code' => 'M',
                'description' => 'MMK',
                'procuring_entity_package_id' => 1,
                'quantity' => 14,
                'sub_project_type_id' => 2,
                'sub_project_status_id' => 1,
            ),
            4 =>
            array (

                'name' => 'Viwandani',
                'project_id' => 1,
                'code' => 'V',
                'description' => 'Viwandani',
                'procuring_entity_package_id' => 1,
                'quantity' => 19,
                'sub_project_type_id' => 3,
                'sub_project_status_id' => 4,
            ),
            5 =>
            array (

                'name' => 'Makanya',
                'project_id' => 1,
                'code' => 'M',
                'description' => 'Makanya',
                'procuring_entity_package_id' => 2,
                'quantity' => 30,
                'sub_project_type_id' => 2,
                'sub_project_status_id' => 3,
            ),
            6 =>
            array (

                'name' => 'Korogwe-Kilungule-Majichumvi',
                'project_id' => 1,
                'code' => 'KKM',
                'description' => 'Korogwe-Kilungule-Majichumvi',
                'procuring_entity_package_id' => 3,
                'quantity' => 30,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 2,
            ),
            7 =>
            array (

                'name' => 'Omary Londo',
                'project_id' => 1,
                'code' => 'ON',
                'description' => 'Omary Londo',
                'procuring_entity_package_id' => 8,
                'quantity' => 10,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 3,
            ),
            8 =>
            array (

                'name' => 'Buguruni-Kisiwani-Tenge-Liwiti',
                'project_id' => 1,
                'code' => 'BITL',
                'description' => 'Buguruni-Kisiwani-Tenge-Liwiti',
                'procuring_entity_package_id' => 12,
                'quantity' => 10,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 1,
            ),
        ));


    }
}
