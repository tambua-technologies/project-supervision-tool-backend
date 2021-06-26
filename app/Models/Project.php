<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


/**
 * @SWG\Definition(
 *      definition="ProjectTicketPayload",
 *      required={"description"},
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
 *      definition="ProjectTicket",
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
 *          property="project_id",
 *          description="project_id",
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
 *      definition="ProjectPayload",
 *      required={"name"},
 *      @SWG\Property(
 *          property="wb_project_id",
 *          description="wb_project_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="color",
 *          description="color",
 *          type="string"
 *      ),
 *    @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="borrower_id",
 *          description="borrower_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_project_cost_id",
 *          description="total_project_cost_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="approval_date",
 *          description="approval_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="approval_fy",
 *          description="approval_fy",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="project_region",
 *          description="project_region",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="closing_date",
 *          description="closing_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="commitment_amount_id",
 *          description="commitment_amount_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_status_id",
 *          description="project_status_id",
 *          type="integer"
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
 *          property="regions",
 *          description="regions",
 *          @SWG\Items(type="integer")
 *      ),
 *      @SWG\Property(
 *          property="shapefiles",
 *          type="array",
 *          @SWG\Items(type="string")
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
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


/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="lga_count",
 *          description="lga_count",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="sub_projects_count",
 *          description="sub_projects_count",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_status_id",
 *          description="project_status_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="color",
 *          description="color",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shapefiles",
 *          type="array",
 *          @SWG\Items(type="string")
 *      ),
 *     @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="borrower_id",
 *          description="borrower_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_project_cost_id",
 *          description="total_project_cost_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="approval_date",
 *          description="approval_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="approval_fy",
 *          description="approval_fy",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="project_region",
 *          description="project_region",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="closing_date",
 *          description="closing_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="commitment_amount_id",
 *          description="commitment_amount_id",
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
        'color',
        'name',
        'wb_project_id',
        'project_status_id',
        'description',
        'borrower_id',
        'project_region',
        'approval_date',
        'approval_fy',
        'closing_date',
        'implementing_agency_id',
        'funding_organisation_id',
        'coordinating_agency_id',
        'country_id',
        'shapefiles',
        'total_project_cost_id',
        'environmental_category_id',
        'commitment_amount_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'color' => 'string',
        'name' => 'string',
        'shapefiles' => 'object',
        'wb_project_id' => 'string',
        'country_id' => 'string',
        'project_status_id' => 'integer',
        'description' => 'string',
        'borrower_id' => 'integer',
        'project_region' => 'string',
        'approval_date' => 'datetime',
        'approval_fy' => 'string',
        'closing_date' => 'datetime',
        'implementing_agency_id' => 'integer',
        'funding_organisation_id' => 'integer',
        'coordinating_agency_id' => 'integer',
        'environmental_category_id' => 'integer',
        'total_project_cost_id' => 'integer',
        'commitment_amount_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string',
        'wb_project_id' => 'required|string',
        'project_status_id' => 'required|integer',
    ];

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($project) { // before delete() method call this
            $project->leaders()->detach();
            $project->themes()->detach();
            $project->sectors()->detach();
            $project->regions()->detach();
            $project->districts()->detach();

            // do the rest of the cleanup...
        });


    }


    public function getLgaCountAttribute(): int
    {
        return $this->procuringEntities()->count();
    }


    public function getSubProjectsCountAttribute(): int
    {
        return $this->subProjects()->count();
    }

    public function attachLeaders($leaders)
    {
        $attachedIds = $this->leaders()->get()->pluck(['id']);
        $collection = collect($leaders);
        $leadersToAttach = $collection->diff($attachedIds);
        $this->leaders()->attach($leadersToAttach);
    }

    public function attachRegions($leaders)
    {
        $attachedIds = $this->regions()->get()->pluck(['id']);
        $collection = collect($leaders);
        $regionsToAttach = $collection->diff($attachedIds);
        $this->regions()->attach($regionsToAttach);
    }


    public function leaders()
    {
        return $this->belongsToMany(FocalPerson::class, 'project_leaders', 'project_id', 'leader_id');
    }


    public function country() {
        return $this->belongsTo(Country::class);

    }


    public function projectStatus() {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'project_regions', 'project_id', 'region_id');
    }

    public function districts()
    {
        return $this->belongsToMany(District::class, 'project_districts', 'project_id', 'district_id');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'project_themes', 'project_id', 'theme_id')->as('details')->withPivot('percent');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'project_sectors', 'project_id', 'sector_id')->as('details')->withPivot('percent');
    }

    public function components()
    {
        return $this->hasMany(ProjectComponent::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function subProjects()
    {
        return $this->hasMany(SubProject::class);
    }

    public function procuringEntities()
    {
        return $this->hasMany(ProcuringEntity::class);
    }


    public function implementing_agency()
    {
        return $this->belongsTo(ImplementingAgency::class, 'implementing_agency_id');
    }

    public function funding_organisation()
    {
        return $this->belongsTo(FundingOrganisation::class);
    }

    public function environmental_category()
    {
        return $this->belongsTo(EnvironmentalCategory::class);
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function total_project_cost()
    {
        return $this->belongsTo(Money::class);
    }

    public function commitment_amount()
    {
        return $this->belongsTo(Money::class);
    }


    static public function statistics($project_id = "")
    {
        if ($project_id) {
            $project_districts_count = DB::table('projects')
                ->join('project_districts', 'projects.id', '=', 'project_districts.project_id')
                ->where('project_districts.project_id', '=', $project_id)
                ->select(DB::raw('count(*) AS total'))
                ->first();

            $project_regions_count = DB::table('projects')
                ->join('project_regions', 'projects.id', '=', 'project_regions.project_id')
                ->where('project_id', '=', $project_id)
                ->select(DB::raw('count(*) AS total'))
                ->first();

            $total_sub_projects = DB::table('projects')
                ->join('project_components', 'projects.id', '=', 'project_components.project_id')
                ->join('project_sub_components', 'project_components.id', '=', 'project_sub_components.project_component_id')
                ->join('procuring_entities', 'project_sub_components.id', '=', 'procuring_entities.project_sub_component_id')
                ->join('procuring_entity_packages', 'procuring_entities.id', '=', 'procuring_entity_packages.procuring_entity_id')
                ->join('sub_projects', 'procuring_entity_packages.id', '=', 'sub_projects.procuring_entity_package_id')
                ->where('project_id', '=', $project_id)
                ->select(DB::raw('count(*) AS total'))
                ->first();

            return ['sub_projects' =>$total_sub_projects->total,  'regions' => $project_regions_count->total ];
        }

        $total_projects = self::count();
        $district_locations_count = DB::table('projects')
            ->join('project_districts', 'projects.id', '=', 'project_districts.project_id')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        $total_commitment_amount = DB::table('projects')
            ->join('project_details', 'projects.id', '=', 'project_details.project_id')
            ->join('money', 'project_details.commitment_amount_id', '=', 'money.id')
            ->join('currencies', 'money.currency_id', '=', 'currencies.id')
            ->groupBy('currencies.iso')
            ->select(DB::raw('CAST(SUM(money.amount) AS BIGINT) AS total, currencies.iso'))
            ->first();

        $total_sub_projects = DB::table('projects')
            ->join('project_components', 'projects.id', '=', 'project_components.project_id')
            ->join('project_sub_components', 'project_components.id', '=', 'project_sub_components.project_component_id')
            ->join('procuring_entities', 'project_sub_components.id', '=', 'procuring_entities.project_sub_component_id')
            ->join('procuring_entity_packages', 'procuring_entities.id', '=', 'procuring_entity_packages.procuring_entity_id')
            ->join('sub_projects', 'procuring_entity_packages.id', '=', 'sub_projects.procuring_entity_package_id')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        $regions_locations_count = DB::table('projects')
            ->join('project_regions', 'projects.id', '=', 'project_regions.project_id')
            ->select(DB::raw('count(*) AS total'))
            ->first();

        return [
            'projects' => $total_projects,
            'commitment_amount' => $total_commitment_amount,
            'sub_projects' =>$total_sub_projects->total,
            'regions' => $regions_locations_count->total
        ];
    }
}
