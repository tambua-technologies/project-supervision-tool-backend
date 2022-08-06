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


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (

            0 =>
            array (
                'name' => 'can create sub-project',
                'guard_name' => 'api',
            ),
            1 =>
            array (
                'name' => 'can create package',
                'guard_name' => 'api',
            ),
            2 =>
            array (
                'name' => 'can create procuring-entity',
                'guard_name' => 'api',
            ),

            3 =>
                array (
                    'name' => 'can create report',
                    'guard_name' => 'api',
                ),
            4 =>
                array (
                    'name' => 'can create ohs and safeguard',
                    'guard_name' => 'api',
                ),
            5 =>
                array (
                    'name' => 'can create field note',
                    'guard_name' => 'api',
                ),
            6 =>
                array (
                    'name' => 'can create user',
                    'guard_name' => 'api',
                ),

            7 =>
                array (
                    'name' => 'can create role',
                    'guard_name' => 'api',
                ),
            8 =>
                array (
                    'name' => 'can create project',
                    'guard_name' => 'api',
                ),
            9 =>
                array (
                    'name' => 'can read sub-project',
                    'guard_name' => 'api',
                ),
            10 =>
                array (
                    'name' => 'can read package',
                    'guard_name' => 'api',
                ),
            11 =>
                array (
                    'name' => 'can read procuring-entity',
                    'guard_name' => 'api',
                ),

            12 =>
                array (
                    'name' => 'can read report',
                    'guard_name' => 'api',
                ),
            13 =>
                array (
                    'name' => 'can read ohs and safeguard',
                    'guard_name' => 'api',
                ),
            14 =>
                array (
                    'name' => 'can read field note',
                    'guard_name' => 'api',
                ),
            15 =>
                array (
                    'name' => 'can read user',
                    'guard_name' => 'api',
                ),

            16 =>
                array (
                    'name' => 'can read role',
                    'guard_name' => 'api',
                ),
            17 =>
                array (
                    'name' => 'can read project',
                    'guard_name' => 'api',
                ),
            18 =>
                array (
                    'name' => 'can update sub-project',
                    'guard_name' => 'api',
                ),
            19 =>
                array (
                    'name' => 'can update package',
                    'guard_name' => 'api',
                ),
            20 =>
                array (
                    'name' => 'can update procuring-entity',
                    'guard_name' => 'api',
                ),

            21 =>
                array (
                    'name' => 'can update report',
                    'guard_name' => 'api',
                ),
            22 =>
                array (
                    'name' => 'can update ohs and safeguard',
                    'guard_name' => 'api',
                ),
            23 =>
                array (
                    'name' => 'can update field note',
                    'guard_name' => 'api',
                ),
            24 =>
                array (
                    'name' => 'can update user',
                    'guard_name' => 'api',
                ),

            25 =>
                array (
                    'name' => 'can update role',
                    'guard_name' => 'api',
                ),
            26 =>
                array (
                    'name' => 'can update project',
                    'guard_name' => 'api',
                ),
            27 =>
                array (
                    'name' => 'can delete sub-project',
                    'guard_name' => 'api',
                ),
            28 =>
                array (
                    'name' => 'can delete package',
                    'guard_name' => 'api',
                ),
            29 =>
                array (
                    'name' => 'can delete procuring-entity',
                    'guard_name' => 'api',
                ),

            30 =>
                array (
                    'name' => 'can delete report',
                    'guard_name' => 'api',
                ),
            31 =>
                array (
                    'name' => 'can delete ohs and safeguard',
                    'guard_name' => 'api',
                ),
            32 =>
                array (
                    'name' => 'can delete field note',
                    'guard_name' => 'api',
                ),
            33 =>
                array (
                    'name' => 'can delete user',
                    'guard_name' => 'api',
                ),

            34 =>
                array (
                    'name' => 'can delete role',
                    'guard_name' => 'api',
                ),
            35 =>
                array (
                    'name' => 'can delete project',
                    'guard_name' => 'api',
                ),
        ));
    }
}
