<?php

use Illuminate\Database\Seeder;

class AgencyUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('agency_user')->delete();
        
        \DB::table('agency_user')->insert(array (
            0 => 
            array (
                
                'user_id' => 1,
                'agency_id' => 12,
                'created_at' => '2022-07-18 18:03:42',
                'updated_at' => '2022-07-18 18:03:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                
                'user_id' => 2,
                'agency_id' => 13,
                'created_at' => '2022-07-18 18:03:56',
                'updated_at' => '2022-07-18 18:03:58',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                
                'user_id' => 3,
                'agency_id' => 11,
                'created_at' => '2022-07-18 18:06:16',
                'updated_at' => '2022-07-18 18:06:19',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                
                'user_id' => 4,
                'agency_id' => 11,
                'created_at' => '2022-07-18 18:06:30',
                'updated_at' => '2022-07-18 18:06:32',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                
                'user_id' => 5,
                'agency_id' => 11,
                'created_at' => '2022-07-18 18:06:45',
                'updated_at' => '2022-07-18 18:06:47',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                
                'user_id' => 6,
                'agency_id' => 11,
                'created_at' => '2022-07-18 18:06:55',
                'updated_at' => '2022-07-18 18:06:57',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
