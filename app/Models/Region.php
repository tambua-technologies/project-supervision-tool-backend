<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @SWG\Definition(
 *      definition="Region",
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
class Region extends Model
{

    public $table = 'regions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adm0_pcode',
        'adm0_en',
        'adm0_sw',
        'adm0_sw',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
    ];


    public function getGeomAttribute()
    {
        return DB::table('regions')
            ->select(DB::raw('ST_AsGeoJSON(geom) AS geom'))
            ->where('id', '=', $this->id)->first()->geom;
    }


    public static function projectsOverview()
    {
        return DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->groupBy('regions.id')
            ->select(DB::raw('regions.id, regions.name, st_asgeojson(regions.geom)::json as geom, count(project_locations.project_id) as projects_count'))
            ->get();
    }


    public static function subProjectsOverview()
    {

        return DB::table('regions')
            ->join('districts', 'districts.region_id', '=','regions.id')
            ->join('locations', 'locations.district_id', '=','districts.id')
            ->join('sub_project_locations', 'sub_project_locations.location_id', '=','locations.id')
            ->where('locations.level', '=', 'district')
            ->groupBy('regions.id')
            ->select(DB::raw('regions.id, regions.name, st_asgeojson(regions.geom)::json as geom,count(sub_project_locations.sub_project_id) as sub_projects_count'))
            ->get();
    }

    public static function get_region_projects_statistics($region_id)
    {

        $total_region_projects = DB::table('projects')
            ->join('project_locations', 'project_locations.project_id', '=', 'projects.id')
            ->join('locations', 'locations.id', '=', 'project_locations.location_id')
            ->groupBy('region_id')
            ->where('region_id', '=', $region_id)
            ->select(DB::raw('count(*) as total'))
            ->first();

        $total_sub_projects = DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->join('projects', 'projects.id', '=', 'project_locations.project_id')
            ->join('sub_projects', 'sub_projects.project_id', '=', 'projects.id')
            ->where('regions.id', '=', $region_id)
            ->select(DB::raw('count(sub_projects.id)'))
            ->first();

        $total_commitment_amount = DB::table('locations')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->join('projects', 'projects.id', '=', 'project_locations.project_id')
            ->join('project_details', 'project_details.project_id', '=', 'projects.id')
            ->join('money', 'money.id', '=', 'project_details.commitment_amount_id')
            ->join('currencies', 'currencies.id', '=', 'money.currency_id')
            ->where('region_id', '=', $region_id)
            ->groupBy('currencies.iso')
            ->select(DB::raw('CAST( SUM(amount) AS BIGINT) AS total, iso'))
            ->first();

        return [
            'projects' => $total_region_projects->total,
            'sub_projects' => $total_sub_projects->count,
            'commitment_amount' => $total_commitment_amount
        ];

    }

    public static function get_region_sub_projects_statistics($region_id): array
    {


        $total_sub_projects = DB::table('sub_projects')
            ->join('sub_project_locations', 'sub_project_locations.sub_project_id', '=','sub_projects.id')
            ->join('locations', 'locations.id', '=','sub_project_locations.location_id')
            ->join('districts', 'districts.id', '=','locations.district_id')
            ->where('districts.region_id', '=', $region_id)
            ->select(DB::raw('count(*) AS total'))
            ->first();

        return [
            'sub_projects' => $total_sub_projects->total,
        ];

    }

    public static function getProjects($region_id)
    {
//        DB::enableQueryLog();

        $projectIds = DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->join('projects', 'projects.id', '=', 'project_locations.project_id')
            ->where('regions.id', '=', $region_id)
            ->groupBy('projects.id', 'region_id', 'regions.id', 'projects.name')
            ->select(DB::raw('projects.id'))
            ->get()->pluck(['id']);
//        Log::info(DB::getQueryLog());
        return Project::find($projectIds);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_regions', 'region_id', 'project_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

}
