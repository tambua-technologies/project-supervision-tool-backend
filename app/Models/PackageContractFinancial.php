<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PackageContractFinancialPayload",
 *      required={"package_contract_id,equipment_name"},
 *     @SWG\Property(
 *          property="package_contract_id",
 *          description="package_contract_id",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="invoice_no",
 *          description="invoice_no",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="particulars",
 *          description="particulars",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="object",
 *          @SWG\Property(
 *             property="amount",
 *             description="amount of money",
 *             type="number"
 *                ),
 *          @SWG\Property(
 *             property="currency",
 *             description="currency of the money",
 *             type="string"
 *               ),
 *      ),
 *      @SWG\Property(
 *          property="remarks",
 *          description="remarks",
 *          type="string"
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="PackageContractFinancial",
 *     @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="package_contract_id",
 *          description="package_contract_id",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="invoice_no",
 *          description="invoice_no",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="particulars",
 *          description="particulars",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="object",
 *          @SWG\Property(
 *             property="amount",
 *             description="amount of money",
 *             type="number"
 *                ),
 *          @SWG\Property(
 *             property="currency",
 *             description="currency of the money",
 *             type="string"
 *               ),
 *      ),
 *      @SWG\Property(
 *          property="remarks",
 *          description="remarks",
 *          type="string"
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
class PackageContractFinancial extends Model
{
    use SoftDeletes;

    public $table = 'package_contract_financials';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'package_contract_id',
        'invoice_no',
        'particulars',
        'amount',
        'remarks',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_contract_id' => 'integer',
        'invoice_no' => 'integer',
        'particulars' => 'string',
        'amount' => 'object',
        'remarks' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function contract()
    {
        return $this->belongsTo(ProcuringEntityPackageContract::class, 'package_contract_id');
    }

}
