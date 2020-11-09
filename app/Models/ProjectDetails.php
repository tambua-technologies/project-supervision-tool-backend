<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProjectDetails",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="borrower",
 *          description="borrower",
 *          type="string"
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
class ProjectDetails extends Model
{
    use SoftDeletes;

    public $table = 'project_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'status',
        'borrower',
        'implementing_agency_id',
        'funding_organisation_id',
        'coordinating_agency_id',
        'location_id',
        'total_project_cost_id',
        'approval_date',
        'approval_fy',
        'project_region',
        'closing_date',
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
        'project_id' => 'string',
        'status' => 'boolean',
        'borrower' => 'string',
        'total_project_cost_id' => 'integer',
        'approval_date' => 'datetime',
        'approval_fy' => 'date',
        'project_region' => 'string',
        'closing_date' => 'datetime',
        'commitment_amount_integer' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
