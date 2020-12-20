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

        /*
         * seed item locations
         * steps
         *   1. randomly get location from sub project
         *   2. get a random point from that location
         *   3. attach that  random point to sub project item location
        */
    }
}
