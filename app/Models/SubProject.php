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
 *      definition="SubProjectTicketPayload",
 *      required={"description, project_id, sub_project_id"},
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location",
 *          description="location",
 *          type="object",
 *           ref="#/definitions/GeoJSON"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_type_id",
 *          description="ticket_type_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_status_id",
 *          description="ticket_status_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="agency_responsible_id",
 *          description="agency_responsible_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="operator_id",
 *          description="operator_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="assignee_id",
 *          description="assignee_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="reporter_id",
 *          description="reporter_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_reporting_method_id",
 *          description="ticket_reporting_method_id",
 *          type="integer"
 *      )
 * )
 */




/**
 * @SWG\Definition(
 *      definition="SubProjectTicket",
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location",
 *          description="location",
 *          type="object"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_type_id",
 *          description="ticket_type_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_status_id",
 *          description="ticket_status_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="agency_responsible_id",
 *          description="agency_responsible_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="operator_id",
 *          description="operator_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="assignee_id",
 *          description="assignee_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="reporter_id",
 *          description="reporter_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_reporting_method_id",
 *          description="ticket_reporting_method_id",
 *          type="integer"
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
 *      required={"name", "description", "project_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
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
 *          property="procuring_entity_package_id",
 *          description="procuring_entity_package_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="procuring_entity_id",
 *          description="procuring_entity_id",
 *          type="integer",
 *          format="int32"
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
 *      required={"name", "description", "procuring_entity_package_id"},
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
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="procuring_entity_package_id",
 *          description="procuring_entity_package_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="procuring_entity_id",
 *          description="procuring_entity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_status_id",
 *          description="sub_project_status_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="float",
 *      ),
 *      @SWG\Property(
 *          property="sub_project_type_id",
 *          description="sub_project_type_id",
 *          type="integer",
 *          format="int32"
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
        'geo_json',
        'description',
        'procuring_entity_package_id',
        'project_id',
        'procuring_entity_id',
        'sub_project_type_id',
        'sub_project_status_id',
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
        'geo_json' => 'object',
        'description' => 'string',
        'quantity' => 'float',
        'procuring_entity_package_id' => 'integer',
        'procuring_entity_id' => 'integer',
        'project_id' => 'integer',
        'sub_project_type_id' => 'integer',
        'sub_project_status_id' => 'integer',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'code' => 'required|string',
        'geo_json' => 'required',
        'sub_project_type_id' => 'required',
        'project_id' => 'required',
        'sub_project_status_id' => 'required',
        'description' => 'required|string',
    ];


    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($sub_project) { // before delete() method call this
            $sub_project->districts()->detach();
            $sub_project->details()->delete();
        });


    }


    public function details()
    {
        return $this->hasOne(SubProjectDetail::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function type()
    {
        return $this->belongsTo(SubProjectType::class, 'sub_project_type_id');
    }

    public function status()
    {
        return $this->belongsTo(SubProjectStatus::class, 'sub_project_status_id');
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

    public function progress_history()
    {
        return $this->belongsToMany(Progress::class, 'sub_project_progress_history', 'sub_project_id', 'progress_id')->as('details')
            ->withTimestamps();
    }

    public function districts()
    {
        return $this->belongsToMany(District::class, 'sub_project_district', 'sub_project_id', 'district_id');
    }

    public function removeDuplicateIds($arr)
    {
        $attachedIds = $this->sub_project_locations()->get()->pluck(['id']);
        $collection = collect($arr);
        return $collection->diff($attachedIds);
    }

    public function procuringEntityPackage()
    {
        return $this->belongsTo(ProcuringEntityPackage::class);
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
