<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProcuringEntity",
 *      required={"agency_id,project_sub_component_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="project_sub_component_id",
 *          description="project_sub_component_id",
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
        'project_sub_component_id',
        'agency_id',
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_sub_component_id' => 'integer',
        'agency_id' => 'integer',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'agency_id',
        'project_sub_component_id',
    ];

}