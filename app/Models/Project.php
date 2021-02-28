<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


/**
 * @SWG\Definition(
 *      definition="ProjectPayload",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="leaders",
 *          description="leaders",
 *          @SWG\Items(type="integer")
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="locations",
 *          description="locations",
 *          @SWG\Items(type="integer")
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'code',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string',
    ];

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($project) { // before delete() method call this
            $project->leaders()->detach();
            $project->themes()->detach();
            $project->sectors()->detach();
            $project->locations()->delete();
            $project->details()->delete();
            $project->sub_projects()->delete();

            // do the rest of the cleanup...
        });


    }

    public function attachLeaders($leaders)
    {
        $attachedIds = $this->leaders()->get()->pluck(['id']);
        $collection = collect($leaders);
        $leadersToAttach = $collection->diff($attachedIds);
        $this->leaders()->attach($leadersToAttach);
    }

    public function attachLocations($locations)
    {
        $attachedIds = $this->locations()->get()->pluck(['id']);
        $collection = collect($locations);
        $locationsToAttach = $collection->diff($attachedIds);

        $this->locations()->attach($locationsToAttach);
    }


    public function leaders()
    {
        return $this->belongsToMany(FocalPerson::class, 'project_leaders', 'project_id', 'leader_id');
    }

    public function details()
    {
        return $this->hasOne(ProjectDetails::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'project_themes', 'project_id', 'theme_id')->as('details')->withPivot('percent');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'project_sectors', 'project_id', 'sector_id')->as('details')->withPivot('percent');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'project_locations', 'project_id', 'location_id');
    }

    public function sub_projects()
    {
        return $this->hasMany(SubProject::class);
    }


    static public function statistics($project_id = "")
    {
        if ($project_id) {
            $project_districts_count = DB::table('locations')
                ->join('project_locations', 'locations.id', '=', 'project_locations.location_id')
                ->where('level', '=', 'district')
                ->where('project_id', '=', $project_id)
                ->select(DB::raw('count(*) AS total'))
                ->first();

            $project_regions_count = DB::table('locations')
                ->join('project_locations', 'locations.id', '=', 'project_locations.location_id')
                ->where('level', '=', 'region')
                ->where('project_id', '=', $project_id)
                ->select(DB::raw('count(*) AS total'))
                ->first();
            return [ 'districts' =>$project_districts_count->total,  'regions' => $project_regions_count->total ];
        }

        $total_projects = Project::count();
        $district_locations_count = DB::table('locations')
            ->join('project_locations', 'locations.id', '=', 'project_locations.location_id')
            ->where('level', '=', 'district')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        $total_commitment_amount = DB::table('projects')
            ->join('project_details', 'projects.id', '=', 'project_details.project_id')
            ->join('money', 'project_details.commitment_amount_id', '=', 'money.id')
            ->join('currencies', 'money.currency_id', '=', 'currencies.id')
            ->groupBy('currencies.iso')
            ->select(DB::raw('CAST(SUM(money.amount) AS BIGINT) AS total, currencies.iso'))
            ->first();

        $regions_locations_count = DB::table('regions')
            ->join('locations', 'locations.region_id', '=', 'regions.id')
            ->join('project_locations', 'project_locations.location_id', '=', 'locations.id')
            ->groupBy('regions.id')
            ->select(DB::raw('regions.id, regions.name, regions.geom, count(project_locations.project_id) as projects_count'))
            ->get()->count();

        return [
            'projects' => $total_projects,
            'commitment_amount' => $total_commitment_amount,
            'districts' =>$district_locations_count->total,
            'regions' => $regions_locations_count
        ];
    }


}
