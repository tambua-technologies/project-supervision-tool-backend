<?php

use Illuminate\Database\Seeder;

class PhasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('phases')->delete();
        
        \DB::table('phases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Evaluation',
                'description' => 'Asperiores repellat ut debitis modi incidunt eos nihil natus. Reiciendis quasi aspernatur ut quidem voluptatem esse optio. Sint velit quibusdam officiis ea.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:44:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Implementation',
                'description' => 'Et praesentium possimus ipsam quo. Est quidem et quisquam facere ea voluptas adipisci. Asperiores odio eos molestias ea rerum voluptas numquam. Sequi nostrum in quis sint sunt quam.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:50:47',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Preparation',
                'description' => 'Ut rerum itaque quis consectetur. Perspiciatis commodi dolor sapiente autem aspernatur dolorum. Et dolore soluta nihil et qui magni. Labore optio ut commodi.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:51:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Est qui doloremque odit dolor voluptates.',
                'description' => 'Vel illo laboriosam commodi consequatur. Facere dolorum nostrum a aliquam qui beatae. Enim doloremque autem praesentium. Nam explicabo voluptatem tempore aut numquam id.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:51:21',
                'deleted_at' => '2021-01-19 06:51:21',
            ),
            4 => 
            array (
                'id' => 4,
                'name' => 'Quod voluptatem nesciunt aut iure fugit.',
                'description' => 'Non et voluptatibus esse consequatur. Delectus omnis omnis odio cumque.',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:51:28',
                'deleted_at' => '2021-01-19 06:51:28',
            ),
        ));
        
        
    }
}