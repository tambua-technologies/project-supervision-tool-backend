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
                'created_at' => '2021-04-26 07:19:22',
                'updated_at' => '2021-04-26 07:19:22',
            ),
            1 =>
            array (
                'name' => 'csc',
                'guard_name' => 'api',
                'created_at' => '2022-05-04 19:16:20',
                'updated_at' => '2022-05-04 19:16:20',
            ),
            2 =>
            array (
                'name' => 'dmdp-project-coordinator',
                'guard_name' => 'api',
                'created_at' => '2022-05-04 19:17:33',
                'updated_at' => '2022-05-04 19:17:33',
            ),
        ));


    }
}
