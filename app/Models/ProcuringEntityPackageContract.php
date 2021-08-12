<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ProcuringEntityPackageContractPayload",
 *      required={"procuring_entity_package_id,name,contract_no"},
 *     @SWG\Property(
 *          property="name",
 *          description="name of the contract",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="contract_no",
 *          description="number of the contract",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="procuring_entity_package_id",
 *          description="id of the procuring entity package",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="contractor_id",
 *          description="id of the procuring entity package contractor",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="original_contract_sum",
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
 *          property="revised_contract_sum",
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
 *          property="date_contract_agreement_signed",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_commencement_of_works",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_possession_of_site_given",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_end_of_mobilization_period",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_contract_completion",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_date_of_contract_completion",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="defects_liability_notification_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="original_contract_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="revised_contract_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="actual_physical_progress",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="planned_physical_progress",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="financial_progress",
 *          type="number",
 *      )
 * )
 */




/**
 * @SWG\Definition(
 *      definition="ProcuringEntityPackageContract",
 *     @SWG\Property(
 *          property="name",
 *          description="name of the contract",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="contract_no",
 *          description="number of the contract",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="procuring_entity_package_id",
 *          description="id of the procuring entity package",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="contractor_id",
 *          description="id of the procuring entity package contractor",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="original_contract_sum",
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
 *          property="revised_contract_sum",
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
 *          property="date_contract_agreement_signed",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_commencement_of_works",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_possession_of_site_given",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_end_of_mobilization_period",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="date_of_contract_completion",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_date_of_contract_completion",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="defects_liability_notification_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="original_contract_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="revised_contract_period",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="actual_physical_progress",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="planned_physical_progress",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="financial_progress",
 *          type="number",
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          type="string",
 *      )
 * )
 */
class ProcuringEntityPackageContract extends Model
{
    use SoftDeletes;

    public $table = 'procuring_entity_package_contract';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'procuring_entity_package_id',
        'name',
        'contract_no',
        'original_contract_sum',
        'revised_contract_sum',
        'original_signing_date',
        'revised_signing_date',
        'commencement_date',
        'contract_period',
        'revised_end_date_of_contract',
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'procuring_entity_package_id' => 'integer',
        'name' => 'string',
        'contract_no' => 'string',
        'original_contract_sum' => 'object',
        'revised_contract_sum' => 'object',
        'original_signing_date' => 'date',
        'revised_signing_date' => 'date',
        'commencement_date' => 'date',
        'revised_end_date_of_contract' => 'date',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'procuring_entity_package_id',
        'contract_no',
        'name',
    ];

}
