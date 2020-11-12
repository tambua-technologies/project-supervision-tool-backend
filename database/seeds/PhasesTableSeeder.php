<?php

use App\Models\Phase;
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
        factory(Phase::class, 5)->create();
    }
}
