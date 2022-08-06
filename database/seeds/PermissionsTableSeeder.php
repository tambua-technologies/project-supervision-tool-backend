<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (

            0 =>
            array (
                'name' => 'can create sub-projects',
                'guard_name' => 'api',
            ),
            1 =>
            array (
                'name' => 'can create packages',
                'guard_name' => 'api',
            ),
            2 =>
            array (
                'name' => 'can create procuring-entities',
                'guard_name' => 'api',
            ),

            3 =>
                array (
                    'name' => 'can create reports',
                    'guard_name' => 'api',
                ),
            4 =>
                array (
                    'name' => 'can create ohs and safeguards',
                    'guard_name' => 'api',
                ),
            5 =>
                array (
                    'name' => 'can create field notes',
                    'guard_name' => 'api',
                ),
            6 =>
                array (
                    'name' => 'can create users',
                    'guard_name' => 'api',
                ),

            7 =>
                array (
                    'name' => 'can create permissions',
                    'guard_name' => 'api',
                ),
            8 =>
                array (
                    'name' => 'can create projects',
                    'guard_name' => 'api',
                ),
            9 =>
                array (
                    'name' => 'can read sub-projects',
                    'guard_name' => 'api',
                ),
            10 =>
                array (
                    'name' => 'can read packages',
                    'guard_name' => 'api',
                ),
            11 =>
                array (
                    'name' => 'can read procuring-entities',
                    'guard_name' => 'api',
                ),

            12 =>
                array (
                    'name' => 'can read reports',
                    'guard_name' => 'api',
                ),
            13 =>
                array (
                    'name' => 'can read ohs and safeguards',
                    'guard_name' => 'api',
                ),
            14 =>
                array (
                    'name' => 'can read field notes',
                    'guard_name' => 'api',
                ),
            15 =>
                array (
                    'name' => 'can read users',
                    'guard_name' => 'api',
                ),

            16 =>
                array (
                    'name' => 'can read permissions',
                    'guard_name' => 'api',
                ),
            17 =>
                array (
                    'name' => 'can read projects',
                    'guard_name' => 'api',
                ),
            18 =>
                array (
                    'name' => 'can update sub-projects',
                    'guard_name' => 'api',
                ),
            19 =>
                array (
                    'name' => 'can update packages',
                    'guard_name' => 'api',
                ),
            20 =>
                array (
                    'name' => 'can update procuring-entities',
                    'guard_name' => 'api',
                ),

            21 =>
                array (
                    'name' => 'can update reports',
                    'guard_name' => 'api',
                ),
            22 =>
                array (
                    'name' => 'can update ohs and safeguards',
                    'guard_name' => 'api',
                ),
            23 =>
                array (
                    'name' => 'can update field notes',
                    'guard_name' => 'api',
                ),
            24 =>
                array (
                    'name' => 'can update users',
                    'guard_name' => 'api',
                ),

            25 =>
                array (
                    'name' => 'can update permissions',
                    'guard_name' => 'api',
                ),
            26 =>
                array (
                    'name' => 'can update projects',
                    'guard_name' => 'api',
                ),
            27 =>
                array (
                    'name' => 'can delete sub-projects',
                    'guard_name' => 'api',
                ),
            28 =>
                array (
                    'name' => 'can delete packages',
                    'guard_name' => 'api',
                ),
            29 =>
                array (
                    'name' => 'can delete procuring-entities',
                    'guard_name' => 'api',
                ),

            30 =>
                array (
                    'name' => 'can delete reports',
                    'guard_name' => 'api',
                ),
            31 =>
                array (
                    'name' => 'can delete ohs and safeguards',
                    'guard_name' => 'api',
                ),
            32 =>
                array (
                    'name' => 'can delete field notes',
                    'guard_name' => 'api',
                ),
            33 =>
                array (
                    'name' => 'can delete users',
                    'guard_name' => 'api',
                ),

            34 =>
                array (
                    'name' => 'can delete permissions',
                    'guard_name' => 'api',
                ),
            35 =>
                array (
                    'name' => 'can delete projects',
                    'guard_name' => 'api',
                ),
        ));


    }
}
