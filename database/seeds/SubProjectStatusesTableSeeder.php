<?php

use Illuminate\Database\Seeder;

class SubProjectStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_statuses')->delete();

        \DB::table('sub_project_statuses')->insert(array (
            0 =>
            array (
                'name' => 'proposed',
                'description' => 'proposed',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'preliminary planning',
                'description' => 'preliminary planning',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'planned',
                'description' => 'planned',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'under procurement',
                'description' => 'under procurement',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'under implementation',
                'description' => 'under implementation',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'name' => 'default liability period',
                'description' => 'default liability period',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'name' => 'completed',
                'description' => 'completed',
                'created_at' => '2021-04-05 19:26:50',
                'updated_at' => '2021-04-05 19:26:50',
                'deleted_at' => NULL,
            ),
        ));
    }
}
