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
 *          property="procuring_entity_package_id",
 *          description="procuring_entity_package_id",
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
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contract_no",
 *          description="contract_no",
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
class SubProjectContract extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_contracts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'contract_no',
        'procuring_entity_package_id',
        'supervising_agency_id',
        'procuring_entity_id',
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
        'contract_no' => 'string',
        'procuring_entity_package_id' => 'integer',
        'procuring_entity_id' => 'integer',
        'supervising_agency_id' => 'integer',
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
        'procuring_entity_id' => 'required',
    ];

    public function contract_cost()
    {
        return $this->belongsTo(ContractCost::class);
    }

    public function contract_time()
    {
        return $this->belongsTo(ContractTime::class);
    }

    public function procuringEntityPackage()
    {
        return $this->belongsTo(ProcuringEntityPackage::class, 'procuring_entity_package_id');
    }

    public function procuringEntity()
    {
        return $this->belongsTo(ProcuringEntity::class, 'procuring_entity_id');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function supervisingConsultant()
    {
        return $this->belongsTo(SupervisingAgency::class);
    }

}
