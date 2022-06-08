<?php

namespace App\Models;

use App\Imports\Packages\ProcuringEntityPackagesImport;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * @SWG\Definition(
 *      definition="ProcuringEntityPackagePayload",
 *      @SWG\Property(
 *          property="procuring_entity_id",
 *          description="procuring_entity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_component_id",
 *          description="project_component_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_sub_component_id",
 *          description="project_sub_component_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string",
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="ProcuringEntityPackage",
 *      required={"agency_id,project_sub_component_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="project_component_id",
 *          description="project_component_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_sub_component_id",
 *          description="project_sub_component_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string",
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
class ProcuringEntityPackage extends Model
{
    use SoftDeletes;

    public $table = 'procuring_entity_packages';


    protected $dates = ['deleted_at'];

    protected $appends = ['progress', 'work_types'];


    public $fillable = [
        'procuring_entity_id',
        'project_component_id',
        'project_sub_component_id',
        'name',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'procuring_entity_id' => 'integer',
        'project_component_id' => 'integer',
        'project_sub_component_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'contract_progress' => 'object'
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'procuring_entity_id',
        'name',
    ];


    public function getProgressAttribute()
    {
        return $this->progressHistory()->first();
    }


    public function getWorkTypesAttribute()
    {
        return DB::table('sub_project_types')
            ->join(
                'sub_projects',
                'sub_project_types.id',
                '=',
                'sub_projects.sub_project_type_id'
            )
            ->select('sub_project_types.name')
            ->where('procuring_entity_package_id', $this->id)
            ->distinct()
            ->get();
    }


    public function procuringEntity()
    {
        return $this->belongsTo(ProcuringEntity::class, 'procuring_entity_id');
    }

    public function projectComponent()
    {
        return $this->belongsTo(ProjectComponent::class, 'project_component_id');
    }

    public function projectSubComponent()
    {
        return $this->belongsTo(ProjectSubComponent::class, 'project_sub_component_id');
    }

    public function contract()
    {
        return $this->hasOne(ProcuringEntityPackageContract::class, 'procuring_entity_package_id');
    }

    public function progressHistory()
    {
        return $this->hasManyThrough(PackageContractProgress::class, ProcuringEntityPackageContract::class, 'procuring_entity_package_id', 'package_contract_id')->orderBy('progress_date');
    }

    public function subProjects()
    {
        return $this->hasMany(SubProject::class);
    }

    public function equipments()
    {

        return $this->hasManyThrough(
            PackageContractEquipment::class,
            ProcuringEntityPackageContract::class,
            'procuring_entity_package_id',
            'package_contract_id',
        );
    }

    public function staffs()
    {

        return $this->hasManyThrough(PackageContractStaffs::class, ProcuringEntityPackageContract::class);
    }

    public function safeguardConcerns()
    {
        return $this->hasMany(SafeguardConcern::class, 'procuring_entity_id');
    }

}
