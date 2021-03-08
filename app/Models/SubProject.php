<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


/**
 * @SWG\Definition(
 *      definition="SubProjectFilesPayload",
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * )
 */

/**
 * @SWG\Definition(
 *      definition="SubProjectPayload",
 *      required={"name", "description"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
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
 *          property="project_id",
 *          description="project_id",
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
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="SubProject",
 *      required={"name", "description"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *     @SWG\Property(
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
 *          property="project_id",
 *          description="project_id",
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
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class SubProject extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'sub_projects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'code',
        'description',
        'project_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'description' => 'string',
        'project_id' => 'string',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'code' => 'required|string',
        'project_id' => 'required|string',
        'description' => 'required|string',
    ];


    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($sub_project) { // before delete() method call this
            $sub_project->sub_project_locations()->delete();
            $sub_project->details()->delete();
            $sub_project->sub_project_items()->delete();
            $sub_project->sub_project_milestones()->delete();
            $sub_project->human_resources()->delete();
            $sub_project->sub_project_equipments()->delete();
            $sub_project->sub_project_progress()->delete();
            $sub_project->sub_project_progress_history()->delete();
            $sub_project->sub_project_contracts()->delete();
        });


    }


    public function registerMediaCollections()
    {
        $this->addMediaCollection('photos');
    }


    public function details()
    {
        return $this->hasOne(SubProjectDetail::class);
    }

    public function sub_project_items()
    {
        return $this->hasMany(SubProjectItems::class);
    }

    public function surveys()
    {
        return $this->hasMany(SubProjectSurvey::class);
    }

    public function sub_project_equipments()
    {
        return $this->hasMany(SubProjectEquipment::class);
    }

    public function sub_project_milestones()
    {
        return $this->hasMany(SubProjectMilestones::class);
    }

    public function human_resources()
    {
        return $this->hasMany(HumanResource::class);
    }

    public function sub_project_contracts()
    {
        return $this->hasMany(SubProjectContract::class);
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }

    public function sub_project_locations()
    {
        return $this->belongsToMany(Location::class, 'sub_project_locations', 'sub_project_id', 'location_id');
    }

    public function progress_history()
    {
        return $this->belongsToMany(Progress::class, 'sub_project_progress_history', 'sub_project_id', 'progress_id')->as('details')
            ->withTimestamps();
    }

    public function removeDuplicateIds($arr)
    {
        $attachedIds = $this->sub_project_locations()->get()->pluck(['id']);
        $collection = collect($arr);
        return $collection->diff($attachedIds);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function attachLocations($locations)
    {
        $locationsToAttach = $this->removeDuplicateIds($locations);
        $this->sub_project_locations()->attach($locationsToAttach);
    }

    static public function statistics(): array
    {


        $total_sub_projects = SubProject::count();
        $district_locations_count = DB::table('locations')
            ->join('sub_project_locations', 'locations.id', '=', 'sub_project_locations.location_id')
            ->where('level', '=', 'district')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        $regions_locations_count = DB::table('locations')
            ->join('sub_project_locations', 'locations.id', '=', 'sub_project_locations.location_id')
            ->join('districts', 'locations.district_id', '=', 'districts.id')
            ->join('regions', 'districts.region_id', '=', 'regions.id')
            ->where('level', '=', 'district')
            ->groupBy('districts.region_id')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        return [
            'sub_projects' => $total_sub_projects,
            'districts' =>$district_locations_count->total,
            'regions' => $regions_locations_count->total,
        ];
    }


}
