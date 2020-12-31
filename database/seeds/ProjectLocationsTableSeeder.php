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

            // get random regionId from 1 - 3
            $regionIds = $regions->random(rand(1, 5))->pluck('id');

            // for each region id, create location and attach to project
            $regionIds->each(function ($regionId) use ($project){

                // for each region get geom get point on its surface and add to location
                $point = DB::table('regions')
                    ->select(DB::raw('st_asgeojson(ST_PointOnSurface(geom::geometry))::json as point'))
                    ->where('id', '=', $regionId)->get()->pluck(['point']);
                $result = collect($point)->first();

                $location = Location::create(['region_id' => $regionId, 'level' => 'region', 'point' => $result]);
                $project->locations()->attach($location->id);
            });
        });
    }
}
