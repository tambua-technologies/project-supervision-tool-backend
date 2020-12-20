<?php

use App\Models\Location;
use App\Models\Project;
use App\Models\Region;
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
        $regions = Region::all();

        // Populate the pivot table
        Project::all()->each(function ($project) use ($regions) {
            $regionIds = $regions->random(rand(1, 5))->pluck('id');
            $regionIds->each(function ($regionId) use ($project){
                $location = Location::create(['region_id' => $regionId, 'level' => 'region']);
                $project->locations()->attach($location->id);
            });
        });
    }
}
