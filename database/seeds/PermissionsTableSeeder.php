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
                'name' => 'can create survey',
                'guard_name' => 'api',
                'created_at' => '2021-04-26 19:50:34',
                'updated_at' => '2021-04-26 19:50:34',
            ),
            1 =>
            array (
                'name' => 'can manage project',
                'guard_name' => 'api',
                'created_at' => '2022-05-04 19:20:43',
                'updated_at' => '2022-05-04 19:20:43',
            ),
            2 =>
            array (
                'name' => 'can manage packages',
                'guard_name' => 'api',
                'created_at' => '2022-05-04 19:21:42',
                'updated_at' => '2022-05-04 19:21:42',
            ),
        ));


    }
}
