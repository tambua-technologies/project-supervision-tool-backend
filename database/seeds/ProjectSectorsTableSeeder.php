<?php

use App\Models\ProjectSectors;
use Illuminate\Database\Seeder;

class ProjectSectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(ProjectSectors::class, 3)->create();
    }
}
