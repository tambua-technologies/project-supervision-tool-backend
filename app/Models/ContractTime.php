<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContractTime",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="original_contract_period",
 *          description="original_contract_period",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="defects_liability_period",
 *          description="defects_liability_period",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="time_extension_granted",
 *          description="time_extension_granted",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="time_extension_applied_not_yet_granted",
 *          description="time_extension_applied_not_yet_granted",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intended_completion_date",
 *          description="intended_completion_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="revised_completion_date",
 *          description="revised_completion_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="time_percentage_lapsed_to_date",
 *          description="time_percentage_lapsed_to_date",
 *          type="number",
 *          format="number"
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
class ContractTime extends Model
{
    use SoftDeletes;

    public $table = 'contract_times';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'start_date',
        'original_contract_period',
        'defects_liability_period',
        'time_extension_granted',
        'time_extension_applied_not_yet_granted',
        'intended_completion_date',
        'revised_completion_date',
        'time_percentage_lapsed_to_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'datetime',
        'original_contract_period' => 'string',
        'defects_liability_period' => 'string',
        'time_extension_granted' => 'string',
        'time_extension_applied_not_yet_granted' => 'string',
        'intended_completion_date' => 'datetime',
        'revised_completion_date' => 'datetime',
        'time_percentage_lapsed_to_date' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
