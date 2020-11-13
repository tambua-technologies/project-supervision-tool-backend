<?php

use App\Models\SubProjectMilestones;
use Illuminate\Database\Seeder;

class SubProjectMilestonesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(SubProjectMilestones::class, 3)->create();
    }
}
