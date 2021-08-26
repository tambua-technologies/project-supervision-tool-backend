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
                'name' => 'TE2 SERENGETI DRAIN',
                'code' => NULL,
                'description' => NULL,
                'quantity' => '{"unit": "m", "amount": 3500}',
                'geo_json' => NULL,
                'district_id' => 'TZ0703',
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => 1,
                'sub_project_type_id' => 6,
                'project_id' => 1,
                'sub_project_status_id' => 5,
                'created_at' => '2021-08-15 07:55:50',
                'updated_at' => '2021-08-15 07:55:50',
                'deleted_at' => NULL,
            ),
        ));


    }
}
