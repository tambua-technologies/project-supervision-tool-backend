<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 'TZ',
                'name' => 'Tanzania',
                'created_at' => '2021-04-04 13:08:48',
                'updated_at' => '2021-04-04 13:08:48',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}