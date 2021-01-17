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
        $regions = Region::all();

        // Populate the pivot table
        Project::all()->each(function ($project) use ($regions) {

            // get random regionId from 1 - 3
            $regionId = Region::query()->inRandomOrder()->first()->id;
            // for each region get geom get point on its surface and add to location
            $point = DB::table('regions')
                ->select(DB::raw('st_asgeojson(ST_PointOnSurface(geom::geometry))::json as point'))
                ->where('id', '=', $regionId)->get()->pluck(['point']);
            $result = json_decode(collect($point)->first());

            $location = Location::create(['region_id' => $regionId, 'level' => 'region', 'point' => $result]);
            $project->locations()->attach($location->id);
        });
    }
}
