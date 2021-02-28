<?php

use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\User;
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
        factory(ProjectDetails::class, 5)->create();

        $users = User::all();
        // Populate the pivot table
        Project::all()->each(function ($project) use ($users) {
            $project->leaders()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
