<?php

use App\Models\Location;
use App\Models\SubProject;
use App\Models\SubProjectItems;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubProjectItemLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_project_items = SubProjectItems::all();
        $sub_project_items->each(function ($sub_project_item) {
            $sub_project = $sub_project_item->sub_project()->first();
            $locations = $sub_project->sub_project_locations()->get();
            $locations->each(function ($location) use ($sub_project_item) {
                $point = DB::table('districts')
                    ->select(DB::raw('st_asgeojson(ST_PointOnSurface(geom::geometry))::json as point'))
                    ->where('id', '=', $location->district_id)->get()->pluck(['point']);
                $result = collect($point)->first();
                $geonode_layers = collect(['geonode:dar_es_salaam_school_points']);
                $sub_project_item_location = Location::create(['point' => $result, 'layer_source' => 'geonode', 'layer_name' => $geonode_layers->random()]);
                $sub_project_item->locations()->attach($sub_project_item_location->id);

            });
        });
    }
}
