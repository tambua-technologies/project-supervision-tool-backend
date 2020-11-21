<?php

use App\Models\Project;
use App\Models\ProjectDetails;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProjectDetails::class, 10)->create();
    }
}
