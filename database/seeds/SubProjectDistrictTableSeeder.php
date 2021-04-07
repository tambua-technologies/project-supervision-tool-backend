<?php

use Illuminate\Database\Seeder;

class SubProjectDistrictTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_district')->delete();

        \DB::table('sub_project_district')->insert(array (
            0 =>
            array (
                'id' => 1,
                'district_id' => 'TZ0702',
                'sub_project_id' => '1',
            ),
            1 =>
            array (
                'id' => 2,
                'district_id' => 'TZ0701',
                'sub_project_id' => '2',
            ),
            2 =>
            array (
                'id' => 3,
                'district_id' => 'TZ0703',
                'sub_project_id' => '3',
            ),
            3 =>
            array (
                'id' => 4,
                'district_id' => 'TZ0701',
                'sub_project_id' => '4',
            ),
            4 =>
            array (
                'id' => 5,
                'district_id' => 'TZ0702',
                'sub_project_id' => '5',
            ),
            5 =>
            array (
                'id' => 6,
                'district_id' => 'TZ0703',
                'sub_project_id' => '6',
            ),
            6 =>
            array (
                'id' => 7,
                'district_id' => 'TZ0702',
                'sub_project_id' => '7',
            ),
            7 =>
            array (
                'id' => 8,
                'district_id' => 'TZ0703',
                'sub_project_id' => '8',
            ),
            8 =>
            array (
                'id' => 9,
                'district_id' => 'TZ0701',
                'sub_project_id' => '9',
            ),
        ));


    }
}
