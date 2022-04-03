<?php

namespace App\Models;

use App\Imports\Packages\ProcuringEntityPackagesImport;
use App\Imports\SubProjects\SubProjectsImport;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
 *          property="project_id",
 *          description="project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="sub_project_type_id",
 *          description="sub_project_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="sub_project_status_id",
 *          description="sub_project_status_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="district_id",
 *          description="district_id",
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
 *     @SWG\Property(
 *         property="quantity",
 *         type="object",
 *         @SWG\Property(
 *           property="amount",
 *           type="number"
 *         ),
 *         @SWG\Property(
 *           property="unit",
 *           type="string"
 *         )
 *     ),
 *     @SWG\Property(
 *       property="geo_json",
 *       type="object"
 *     ),
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
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="SubProject",
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
 *          property="district_id",
 *          description="district_id",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *         property="quantity",
 *         type="object",
 *         @SWG\Property(
 *           property="amount",
 *           type="number"
 *         ),
 *         @SWG\Property(
 *           property="unit",
 *           type="string"
 *         )
 *     ),
 *     @SWG\Property(
 *       property="geo_json",
 *       type="object"
 *     ),
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
 *          property="sub_project_type_id",
 *          description="sub_project_type_id",
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
        'quantity',
        'procuring_entity_package_id',
        'project_id',
        'district_id',
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
        'quantity' => 'object',
        'procuring_entity_package_id' => 'integer',
        'district_id' => 'string',
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
        'project_id' => 'required',
        'district_id' => 'required',
    ];

    public static function import()
    {
        $import = new SubProjectsImport();

        Excel::import($import, 'subprojects_data_model.xlsx');
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function surveys()
    {
        return $this->hasMany(SubProjectSurvey::class);
    }

    public function milestones()
    {
        return $this->hasMany(SubProjectMilestones::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function procuringEntity()
    {
        return $this->belongsTo(ProcuringEntity::class);
    }

    public function procuringEntityPackage()
    {
        return $this->belongsTo(ProcuringEntityPackage::class);
    }
}
