<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubProjectMilestonesPayload",
 *      required={"name,sub_project_id"},
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
 *          property="is_measurable",
 *          description="is_measurable",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          type="integer",
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          type="object",
 *          @SWG\Property(
 *             property="amount",
 *             type="number"
 *           ),
 *          @SWG\Property(
 *             property="unit",
 *             type="string"
 *           ),
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="SubProjectMilestones",
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
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_measurable",
 *          description="is_measurable",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          type="integer",
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          type="object",
 *          @SWG\Property(
 *             property="amount",
 *             type="number"
 *           ),
 *          @SWG\Property(
 *             property="unit",
 *             type="string"
 *           ),
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
class SubProjectMilestones extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_milestones';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'quantity',
        'is_measurable',
        'sub_project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sub_project_id' => 'integer',
        'name' => 'string',
        'quantity' => 'object',
        'is_measurable' => 'boolean',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sub_project_id' => 'required',
        'name' => 'required',
    ];


}
