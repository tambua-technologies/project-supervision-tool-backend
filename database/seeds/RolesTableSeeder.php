<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'name' => 'admin',
                'guard_name' => 'api',
            ),
            1 =>
            array (
                'name' => 'construction supervision consultant',
                'guard_name' => 'api',
            ),
            2 =>
            array (
                'name' => 'sub-projects coordinator',
                'guard_name' => 'api',
            ),
            3 =>
                array (
                    'name' => 'procurement officer',
                    'guard_name' => 'api',
                ),
            4 =>
                array (
                    'name' => 'safeguards personnel',
                    'guard_name' => 'api',
                ),
            5 =>
                array (
                    'name' => 'project coordinator',
                    'guard_name' => 'api',
                ),
            6 =>
                array (
                    'name' => 'world-bank ttl',
                    'guard_name' => 'api',
                ),
            7 =>
                array (
                    'name' => 'lga executive director',
                    'guard_name' => 'api',
                ),
            8 =>
                array (
                    'name' => 'district administrative secretary',
                    'guard_name' => 'api',
                ),
            9 =>
                array (
                    'name' => 'regional administrative secretary',
                    'guard_name' => 'api',
                ),
            10 =>
                array (
                    'name' => 'PO-RALG director of infrastructure',
                    'guard_name' => 'api',
                ),
        ));


    }
}
