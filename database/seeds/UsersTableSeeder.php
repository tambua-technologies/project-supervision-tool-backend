<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 100,
                'name' => NULL,
                'first_name' => 'Test',
                'last_name' => 'User',
                'middle_name' => 'Project Supervision tool',
                'phone' => NULL,
                'email' => 'testing@project-supervision-tool.com',
                'type' => 'focal_person',
                'location_id' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$TMuGZwRiElEtuuHGDzf4sOB6J5gOTPdyQUmeQnh8WJmPNXQRkxSBC',
                'remember_token' => NULL,
                'created_at' => '2021-01-17 06:32:04',
                'updated_at' => '2021-01-17 06:32:04',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 102,
                'name' => NULL,
                'first_name' => 'Beatrice',
                'last_name' => 'Mkumbo',
                'middle_name' => 'Charles',
                'phone' => '248-402-0400 x528',
                'email' => 'charsbeaty@gmail.com',
                'type' => 'focal_person',
                'location_id' => NULL,
                'email_verified_at' => '2020-11-16 08:14:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 103,
                'name' => NULL,
                'first_name' => 'Edgar',
                'last_name' => 'Mlowe',
                'middle_name' => 'Vitus',
                'phone' => '689-885-3690',
                'email' => 'mloweedgarvitus@gmail.com',
                'type' => 'focal_person',
                'location_id' => NULL,
                'email_verified_at' => '2020-11-16 08:14:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            )
        ));


    }
}
