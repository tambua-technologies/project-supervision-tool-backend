<?php

use App\Models\SubProjectDetail;
use Illuminate\Database\Seeder;

class SubProjectDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(SubProjectDetail::class, 10)->create();
    }
}
