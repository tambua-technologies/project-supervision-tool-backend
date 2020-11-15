<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubProjectContract",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
class SubProjectContract extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_contracts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'sub_project_id',
        'contract_cost_id',
        'contract_time_id',
        'contractor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'sub_project_id' => 'integer',
        'contract_cost_id' => 'integer',
        'contract_time_id' => 'integer',
        'contractor_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function contract_cost()
    {
        return $this->belongsTo(ContractCost::class);
    }

    public function contract_time()
    {
        return $this->belongsTo(ContractTime::class);
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

}
