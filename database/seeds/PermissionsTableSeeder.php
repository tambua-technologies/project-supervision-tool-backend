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
                'id' => 1,
                'name' => 'can create survey',
                'guard_name' => 'api',
                'created_at' => '2021-04-26 19:50:34',
                'updated_at' => '2021-04-26 19:50:34',
            ),
        ));
        
        
    }
}