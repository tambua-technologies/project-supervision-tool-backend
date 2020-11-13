<?php

use Illuminate\Database\Seeder;

class HumanResourcesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\HumanResource::class, 5)->create();
    }
}
