<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sectors')->delete();

        \DB::table('sectors')->insert(array (
            0 =>
            array (
                'name' => 'Urban Tanzania',
                'description' => 'Et porro rem omnis consequatur. Quam ea temporibus eos totam quos facilis occaecati. Blanditiis facere et ut rerum. Officiis consequatur eaque et voluptatibus earum.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:44:36',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Water Supply, Sanitation and Waste Management',
                'description' => 'Rem quaerat est recusandae distinctio quis. Qui accusamus neque assumenda quibusdam. Ipsum voluptas quia ad.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:46:47',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Transportation',
                'description' => 'Id rerum ea ex eveniet molestias quis. Autem autem architecto nulla reiciendis illum voluptate molestias. Ipsa fugit facilis delectus. Eligendi distinctio nihil assumenda incidunt atque voluptas qui.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:47:30',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'Other Public Administration',
                'description' => 'Voluptas reprehenderit rem nihil quam nesciunt ratione. Vel voluptates amet temporibus quod impedit sit quo.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:48:46',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'Aspernatur autem suscipit iste repellendus modi ut.',
                'description' => 'Vel beatae voluptatem quia qui. Sed et soluta maiores ipsa nam. Explicabo quos facilis nesciunt modi sed iusto inventore.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:07:54',
                'deleted_at' => '2021-01-19 06:07:54',
            ),
        ));


    }
}
