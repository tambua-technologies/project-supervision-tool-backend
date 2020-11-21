<?php

use App\Models\Location;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectLocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(Location::class, 10);
        $locations = Location::all();

        // Populate the pivot table
        Project::all()->each(function ($project) use ($locations) {
            $project->locations()->attach(
                $locations->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
