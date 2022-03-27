<?php

namespace App\Models;

use App\Imports\ProcuringEntityPackagesImport;
use Eloquent as Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'procuring_entity_id',
        'name',
    ];



    public static function import()
    {
        $import = new ProcuringEntityPackagesImport();

        Excel::import($import, 'packages_data_model.xlsx');
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

    public function subProjects()
    {
        return $this->hasMany(SubProject::class);
    }

}
