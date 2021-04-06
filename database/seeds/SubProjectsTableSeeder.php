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
                'code' => 'SM',
                'description' => 'Sokoni Makumbusho',
                'procuring_entity_package_id' => 1,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 2,
                'quantity' => 10,
                'created_at' => '2021-03-31 14:50:22',
                'updated_at' => '2021-03-31 14:50:22',
                'deleted_at' => NULL,
            ),
            1 =>
            array (

                'name' => 'Tanesco-Soko la Samaki',
                'code' => 'TSLS',
                'description' => 'Tanesco-Soko la Samaki',
                'procuring_entity_package_id' => 1,
                'sub_project_type_id' => 2,
                'sub_project_status_id' => 3,
                'quantity' => 50,
                'created_at' => '2021-03-31 14:50:22',
                'updated_at' => '2021-03-31 14:50:22',
                'deleted_at' => NULL,
            ),
            2 =>
            array (

                'name' => 'Nzasa',
                'code' => 'N',
                'description' => 'Nzasa',
                'procuring_entity_package_id' => 1,
                'quantity' => 30,
                'sub_project_type_id' => 1,
                'sub_project_status_id' => 2,
                'created_at' => '2021-03-31 14:50:22',
                'updated_at' => '2021-03-31 14:50:22',
                'deleted_at' => NULL,
            ),
            3 =>
            array (

                'name' => 'MMK',
                'code' => 'M',
                'description' => 'MMK',
                'procuring_entity_package_id' => 1,
                'quantity' => 14,
                'sub_project_type_id' => 2,
                'sub_project_status_id' => 1,
                'created_at' => '2021-03-31 14:50:22',
                'updated_at' => '2021-03-31 14:50:22',
                'deleted_at' => NULL,
            ),
            4 =>
            array (

                'name' => 'Viwandani',
                'code' => 'V',
                'description' => 'Viwandani',
                'procuring_entity_package_id' => 1,
                'quantity' => 19,
                'sub_project_type_id' => 3,
                'sub_project_status_id' => 4,
                'created_at' => '2021-03-31 14:50:22',
                'updated_at' => '2021-03-31 14:50:22',
                'deleted_at' => NULL,
            ),
        ));


    }
}
