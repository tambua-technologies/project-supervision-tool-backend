<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\DB;

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
        'geom' => 'object',
    ];

    static public function projectsOverview()
    {
       return DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
           ->groupBy('regions.id')
           ->select(DB::raw('regions.id, regions.name, regions.geom, count(project_locations.project_id) as projects_count'))
            ->get();
    }

    static public function getProjects($region_id)
    {
       $projectIds =  DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->join('projects', 'projects.id', '=', 'project_locations.project_id')
            ->join('sub_projects', 'sub_projects.project_id', '=', 'projects.id')
           ->where('regions.id', '=',$region_id)
           ->groupBy('projects.id', 'region_id', 'regions.id', 'projects.name')
           ->select(DB::raw('projects.id'))
            ->get()->pluck(['id']);
       return Project::find($projectIds);
    }

}
