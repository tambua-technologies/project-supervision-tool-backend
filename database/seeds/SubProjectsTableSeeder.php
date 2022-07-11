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

        \DB::table('sub_projects')->insert(array(
            0 =>
                array(
                    'name' => 'TE2 SERENGETI DRAIN (3500m)',
                    'code' => NULL,
                    'description' => NULL,
                    'quantity' => '{"unit": "1", "quantity": 3500}',
                    'geo_json' => NULL,
                    'district_id' => 'TZ0703',
                    'procuring_entity_package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_type_id' => NULL,
                    'project_id' => 1,
                    'sub_project_status_id' => 5,
                    'created_at' => '2022-07-11 08:41:24',
                    'updated_at' => '2022-07-11 08:41:24',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'name' => 'TE3 TEMEKE DRAIN (953m)',
                    'code' => NULL,
                    'description' => NULL,
                    'quantity' => '{"unit": "1", "quantity": 953}',
                    'geo_json' => NULL,
                    'district_id' => 'TZ0703',
                    'procuring_entity_package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_type_id' => NULL,
                    'project_id' => 1,
                    'sub_project_status_id' => 5,
                    'created_at' => '2022-07-11 08:41:24',
                    'updated_at' => '2022-07-11 08:41:24',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'name' => 'TE9 KEKE DRAIN(1040m)',
                    'code' => NULL,
                    'description' => NULL,
                    'quantity' => '{"unit": "1", "quantity": 1040}',
                    'geo_json' => NULL,
                    'district_id' => 'TZ0703',
                    'procuring_entity_package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_type_id' => NULL,
                    'project_id' => 1,
                    'sub_project_status_id' => 5,
                    'created_at' => '2022-07-11 08:41:24',
                    'updated_at' => '2022-07-11 08:41:24',
                    'deleted_at' => NULL,
                ),
            3 =>
                array(
                    'name' => 'POND',
                    'code' => NULL,
                    'description' => NULL,
                    'quantity' => '{"unit": "1", "quantity": null}',
                    'geo_json' => NULL,
                    'district_id' => 'TZ0703',
                    'procuring_entity_package_id' => 2,
                    'procuring_entity_id' => 1,
                    'sub_project_type_id' => NULL,
                    'project_id' => 1,
                    'sub_project_status_id' => 5,
                    'created_at' => '2022-07-11 08:41:24',
                    'updated_at' => '2022-07-11 08:41:24',
                    'deleted_at' => NULL,
                ),
            4 =>
                array(
                    'name' => 'Kwa Shego Drain (3145m)',
                    'code' => NULL,
                    'description' => NULL,
                    'quantity' => '{"unit": "1", "quantity": 3145}',
                    'geo_json' => NULL,
                    'district_id' => 'TZ0703',
                    'procuring_entity_package_id' => 1,
                    'procuring_entity_id' => 1,
                    'sub_project_type_id' => NULL,
                    'project_id' => 1,
                    'sub_project_status_id' => 5,
                    'created_at' => '2022-07-11 08:41:24',
                    'updated_at' => '2022-07-11 08:41:24',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
