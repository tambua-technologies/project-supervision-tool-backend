<?php

use App\Models\District;
use App\Models\Location;
use App\Models\SubProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubProjectLocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_projects = SubProject::all();
        $sub_projects->each(function ($sub_project){
            $regionIds = DB::table('sub_projects')
                ->join('projects', 'projects.id', '=', 'sub_projects.project_id')
                ->join('project_locations', 'project_locations.project_id', '=', 'projects.id')
                ->join('locations', 'locations.id', '=', 'project_locations.location_id')
                ->join('regions', 'regions.id', '=', 'locations.region_id')
                ->where('sub_projects.id', '=', $sub_project->id)
                ->select('regions.id')->get()->pluck(['id']);
            $regionIds->each(function ($regionId) use ($sub_project) {
                $districtId = District::query()->where('region_id', '=', $regionId)->inRandomOrder()->first()->id;

                // for each district get geom get point on its surface and add to location
                $point = DB::table('districts')
                    ->select(DB::raw('st_asgeojson(ST_PointOnSurface(geom::geometry))::json as point'))
                    ->where('id', '=', $districtId)->get()->pluck(['point']);
                $result = json_decode(collect($point)->first());

                $location = Location::create(['district_id' => $districtId, 'level' => 'district', 'point' => $result ]);
                $sub_project->sub_project_locations()->attach($location->id);
            });
        });
    }
}
