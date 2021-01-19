<?php

use Illuminate\Database\Seeder;

class EnvironmentalCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('environmental_categories')->delete();
        
        \DB::table('environmental_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'A',
                'description' => 'Recusandae sit sint voluptates quibusdam accusamus omnis magnam. Et quidem reprehenderit quia commodi nesciunt asperiores rerum. Ut corrupti dolore odit fugit minima porro.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:36:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'B',
                'description' => 'Sint id voluptatem dolore. Voluptatem eligendi quasi laborum aliquid mollitia. Recusandae assumenda cupiditate et et. Ducimus non sunt provident et.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:37:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'C',
                'description' => 'Et iste voluptate eos aut est in labore fuga. Ex incidunt quis cupiditate in velit. Nihil autem ratione veniam reiciendis. Facere assumenda voluptate odio.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:37:11',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'D',
                'description' => 'Aperiam quae quia ut fuga tempora nam. Optio eius soluta dicta ipsa non ut aut. Repudiandae sint tenetur et asperiores voluptatem. Qui cum molestias omnis et.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:37:27',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'E',
                'description' => 'Vel qui at et. Vel aut laboriosam voluptatibus ullam. Voluptatum aut molestiae velit consequuntur et voluptatibus.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:37:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}