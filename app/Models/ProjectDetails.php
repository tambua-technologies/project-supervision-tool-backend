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
class ProjectDetails extends Model
{
    use SoftDeletes;

    public $table = 'project_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'status',
        'borrower_id',
        'project_region',
        'approval_date',
        'approval_fy',
        'closing_date',
        'implementing_agency_id',
        'funding_organisation_id',
        'coordinating_agency_id',
        'country_id',
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
        'project_id' => 'string',
        'status' => 'boolean',
        'borrower_id' => 'integer',
        'project_region' => 'string',
        'approval_date' => 'datetime',
        'approval_fy' => 'date',
        'closing_date' => 'datetime',
        'implementing_agency_id' => 'integer',
        'funding_organisation_id' => 'integer',
        'coordinating_agency_id' => 'integer',
        'environmental_category_id' => 'integer',
        'total_project_cost_id' => 'integer',
        'commitment_amount_id' => 'integer',
        'country_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function implementing_agency()
    {
        return $this->belongsTo(ImplementingAgency::class);
    }

    public function funding_organisation()
    {
        return $this->belongsTo(FundingOrganisation::class);
    }

    public function coordinating_agency()
    {
        return $this->belongsTo(CoordinatingAgency::class);
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

    public function country ()
    {
        return $this->belongsTo(Location::class);
    }

}
