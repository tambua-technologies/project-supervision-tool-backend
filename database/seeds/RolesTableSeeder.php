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
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'api',
                'created_at' => '2021-04-26 07:19:22',
                'updated_at' => '2021-04-26 07:19:22',
            ),
        ));
        
        
    }
}