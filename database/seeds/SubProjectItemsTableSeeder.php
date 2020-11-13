<?php

use App\Models\SubProjectItems;
use Illuminate\Database\Seeder;

class SubProjectItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(SubProjectItems::class)->create();
    }
}



