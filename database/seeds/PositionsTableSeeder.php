<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('positions')->delete();

        \DB::table('positions')->insert(array (
            0 =>
            array (
                'name' => 'Project Manager/Site Agent',
                'description' => 'Project Manager/Site Agent',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Drainage Engineer',
                'description' => 'Drainage Engineer',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Structural Engineer',
                'description' => 'Structural Engineer',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'Materials Engineer',
                'description' => 'Materials Engineer',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'Quantity Surveyor',
                'description' => 'Quantity Surveyor',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'name' => 'Land Surveyor',
                'description' => 'Land Surveyor',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'name' => 'Environmental Expert',
                'description' => 'Environmental Expert',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'name' => 'Social Expert',
                'description' => 'Social Expert',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'name' => 'Health and Safety Officer',
                'description' => 'Health and Safety Officer',
                'created_at' => '2021-08-14 13:11:01',
                'updated_at' => '2021-08-14 13:11:01',
                'deleted_at' => NULL,
            ),
        ));


    }
}
