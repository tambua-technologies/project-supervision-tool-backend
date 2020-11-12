<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubProjectDetail",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="phase_id",
 *          description="phase_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="supervising_agency_id",
 *          description="supervising_agency_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="contractor_id",
 *          description="contractor_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="actor_id",
 *          description="actor_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="end_date",
 *          description="end_date",
 *          type="string",
 *          format="date-time"
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
class SubProjectDetail extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'actor_id',
        'supervising_agency_id',
        'phase_id',
        'start_date',
        'end_date',
        'contractor_id',
        'sub_project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'actor_id' => 'integer',
        'supervising_agency_id' => 'integer',
        'phase_id' => 'integer',
        'contractor_id' => 'integer',
        'sub_project_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function supervising_agency()
    {
        return $this->belongsTo(SupervisingAgency::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
