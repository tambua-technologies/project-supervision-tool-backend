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

        \DB::table('users')->insert(array (
            0 =>
            array (
                'first_name' => 'Edgar',
                'last_name' => 'Mlowe',
                'middle_name' => 'Vitus',
                'phone' => '689-885-3690',
                'type' => 'focal_person',
                'email' => 'mloweedgarvitus@gmail.com',
                'email_verified_at' => '2020-11-16 08:14:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ),
            1 =>
            array (
                'first_name' => 'Beatrice',
                'last_name' => 'Mkumbo',
                'middle_name' => 'Charles',
                'phone' => '248-402-0400 x528',
                'email' => 'charsbeaty@gmail.com',
                'type' => 'focal_person',
                'email_verified_at' => '2020-11-16 08:14:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ),
        ));


    }
}
