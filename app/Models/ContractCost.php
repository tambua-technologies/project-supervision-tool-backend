<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContractCost",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="works_certified_to_date_percentage",
 *          description="works_certified_to_date_percentage",
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
class ContractCost extends Model
{
    use SoftDeletes;

    public $table = 'contract_costs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'contract_award_value_id',
        'certified_work_to_date_value_id',
        'works_certified_to_date_percentage',
        'financial_penalties_applied_value_id',
        'financial_penalties_granted_value_id',
        'variations_granted_value_id',
        'variations_applied_not_yet_granted_value_id',
        'estimated_final_contract_price_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'works_certified_to_date_percentage' => 'float',
        'contract_award_value_id' => 'integer',
        'certified_work_to_date_value_id' => 'integer',
        'financial_penalties_applied_value_id' => 'integer',
        'financial_penalties_granted_value_id' => 'integer',
        'variations_granted_value_id' => 'integer',
        'variations_applied_not_yet_granted_value_id' => 'integer',
        'estimated_final_contract_price_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];



    public function contract_award_value()
    {
        return $this->belongsTo(Money::class, 'contract_award_value_id');
    }
    public function certified_work_to_date_value()
    {
        return $this->belongsTo(Money::class, 'certified_work_to_date_value_id');
    }
    public function financial_penalties_applied_value()
    {
        return $this->belongsTo(Money::class, 'financial_penalties_applied_value_id');
    }
    public function financial_penalties_granted_value()
    {
        return $this->belongsTo(Money::class, 'financial_penalties_granted_value_id');
    }
    public function variations_granted_value()
    {
        return $this->belongsTo(Money::class, 'variations_granted_value_id');
    }
    public function variations_applied_not_yet_granted_value()
    {
        return $this->belongsTo(Money::class, 'variations_applied_not_yet_granted_value_id');
    }
    public function estimated_final_contract_price()
    {
        return $this->belongsTo(Money::class, 'estimated_final_contract_price_id');
    }
}
