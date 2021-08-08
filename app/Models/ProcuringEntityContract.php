<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;





/**
 * @SWG\Definition(
 *      definition="ProcuringEntityContractPayload",
 *      required={"procuring_entity_id,name,contract_no"},
 *     @SWG\Property(
 *          property="procuring_entity_id",
 *          description="id of the procuring entity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="employer_id",
 *          description="id of the employer",
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
 *          property="original_signing_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_end_date_of_contract",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_signing_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="commencement_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="contract_period",
 *          type="number",
 *      ),
 * )
 */




/**
 * @SWG\Definition(
 *      definition="ProcuringEntityContract",
 *      required={"procuring_entity_id,name,contract_no"},
 *     @SWG\Property(
 *          property="procuring_entity_id",
 *          description="id of the procuring entity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="employer_id",
 *          description="id of the employer",
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
 *          property="original_signing_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_end_date_of_contract",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="revised_signing_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="commencement_date",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="contract_period",
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
class ProcuringEntityContract extends Model
{
    use SoftDeletes;

    public $table = 'procuring_entity_contract';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'procuring_entity_id',
        'employer_id',
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
        'procuring_entity_id' => 'integer',
        'employer_id' => 'integer',
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
        'procuring_entity_id',
        'contract_no',
        'name',
    ];

    public function financers()
    {
        return $this->belongsToMany(Agency::class, 'procuring_entity_contract_financers', 'procuring_entity_contract_id', 'agency_id');
    }

    public function consultants()
    {
        return $this->belongsToMany(Agency::class, 'procuring_entity_contract_supervising_consultants', 'procuring_entity_contract_id', 'agency_id');
    }

}
