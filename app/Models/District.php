<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @SWG\Definition(
 *      definition="District",
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * )
 */
class District extends Model
{

    public $table = 'districts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adm0_pcode',
        'adm0_en',
        'adm1_en',
        'adm0_sw',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'region_id' => 'string',
        'geom' => 'object',
    ];

    public function getGeomAttribute()
    {
        $geom = DB::table('districts')
            ->select(DB::raw('ST_AsGeoJSON(geom) AS geom'))
            ->where('id', '=', $this->id)->first()->geom;

        return $geom;
    }


    static public function subProjectsOverview(): Collection
    {

        return DB::table('districts')
            ->join('locations', 'locations.district_id', '=','districts.id')
            ->join('sub_project_locations', 'sub_project_locations.location_id', '=','locations.id')
            ->where('locations.level', '=', 'district')
            ->groupBy('districts.id')
            ->select(DB::raw('districts.id, districts.name, st_asgeojson(districts.geom)::json as geom,count(sub_project_locations.sub_project_id) as sub_projects_count'))
            ->get();
    }





    static public function subProjectsOverviewPerRegion(string $region_id): Collection
    {

        return DB::table('districts')
            ->join('locations', 'locations.district_id', '=','districts.id')
            ->join('sub_project_locations', 'sub_project_locations.location_id', '=','locations.id')
            ->where('locations.level', '=', 'district')
            ->where('districts.region_id', '=', $region_id)
            ->groupBy('districts.id')
            ->select(DB::raw('districts.id, districts.name, st_asgeojson(districts.geom)::json as geom,count(sub_project_locations.sub_project_id) as sub_projects_count'))
            ->get();
    }



    static public function getSubProjects($districts_id)
    {
//        DB::enableQueryLog();
        $subProjectIds = DB::table('districts')
            ->join('locations', 'locations.district_id', '=', 'districts.id')
            ->join('sub_project_locations', 'sub_project_locations.location_id', '=', 'locations.id')
            ->join('sub_projects', 'sub_projects.id', '=', 'sub_project_locations.sub_project_id')
            ->where('districts.id', '=', $districts_id)
            ->groupBy('sub_projects.id', 'district_id', 'districts.id', 'sub_projects.name')
            ->select(DB::raw('sub_projects.id'))
            ->get()->pluck(['id']);
//        Log::info(DB::getQueryLog());
        return SubProject::find($subProjectIds);
    }





}
