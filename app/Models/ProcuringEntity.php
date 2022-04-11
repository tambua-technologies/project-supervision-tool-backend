<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ProcuringEntityPayload",
 *      required={"agency_id,project_id"},
 *     @SWG\Property(
 *          property="agency_id",
 *          description="id of the municipal or district procuring sub-projects",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="id of the project",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="procured_project_components",
 *          description="ids of procured project components",
 *          type="array",
 *          @SWG\Items(type="integer")
 *      ),
 *      @SWG\Property(
 *          property="procured_project_sub_components",
 *          description="ids of procured project sub_components",
 *          type="array",
 *          @SWG\Items(type="integer")
 *      )
 * )
 */



/**
 * @SWG\Definition(
 *      definition="ProcuringEntity",
 *      required={"agency_id,project_id"},
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
 *          property="agency_id",
 *          description="agency_id",
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
class ProcuringEntity extends Model
{
    use SoftDeletes;

    public $table = 'procuring_entities';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'agency_id',
        'project_id',
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'agency_id' => 'integer',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'agency_id',
        'project_id',
    ];

    public static function getByName($name)
    {
        return ProcuringEntity::join('agencies','procuring_entities.agency_id', 'agencies.id' )
            ->select('procuring_entities.*')
            ->where('agencies.name', 'ilike', $name );
    }

    public function agency ()
    {
        return $this->belongsTo(Agency::class);
    }

    public function contract()
    {
        return $this->hasOne(ProcuringEntityContract::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function procuredProjectComponents()
    {
        return $this->belongsToMany(ProjectComponent::class, 'procured_project_components', 'procuring_entity_id', 'project_component_id');
    }

    public function procuredProjectSubComponents()
    {
        return $this->belongsToMany(ProjectSubComponent::class, 'procured_project_sub_components', 'procuring_entity_id', 'project_sub_component_id');
    }

    public function packages()
    {
        return $this->hasMany(ProcuringEntityPackage::class);
    }

    public function subProjects()
    {
        return $this->hasMany(SubProject::class);
    }

}
