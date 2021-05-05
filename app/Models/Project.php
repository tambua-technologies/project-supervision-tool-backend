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
        'wb_project_id',
        'project_status_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'wb_project_id' => 'string',
        'country_id' => 'string',
        'project_status_id' => 'integer',
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


    public function leaders()
    {
        return $this->belongsToMany(FocalPerson::class, 'project_leaders', 'project_id', 'leader_id');
    }


    public function country() {
        return $this->belongsTo(Country::class);

    }


    public function status() {
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

    public function components()
    {
        return $this->hasMany(ProjectComponent::class);
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
