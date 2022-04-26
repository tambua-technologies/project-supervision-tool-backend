<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PackageContractProgress",
 *      required={"package_contract_id,progress_date"},
 *     @SWG\Property(
 *          property="actual_physical_progress",
 *          description="actual_physical_progress",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="planned_physical_progress",
 *          description="planned_physical_progress",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="actual_financial_progress",
 *          description="actual_financial_progress",
 *          type="integer"
 *      ),
 *
 *      @SWG\Property(
 *          property="planned_financial_progress",
 *          description="planned_financial_progress",
 *          type="integer"
 *      ),
 *    @SWG\Property(
 *          property="progress_date",
 *          description="progress_date",
 *          type="string"
 *      )
 * )
 */
class PackageContractProgress extends Model
{
    use SoftDeletes;

    public $table = 'package_contract_progress';


    protected $dates = ['deleted_at', 'progress_date'];



    public $fillable = [
        'package_contract_id',
        'actual_physical_progress',
        'planned_physical_progress',
        'actual_financial_progress',
        'planned_financial_progress',
        'progress_date',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'package_contract_id' => 'integer',
        'actual_physical_progress' => 'integer',
        'planned_physical_progress' => 'integer',
        'actual_financial_progress' => 'integer',
        'planned_financial_progress' => 'integer',
        'progress_date' => 'date',
    ];

}
