<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PackageContractStaffPayload",
 *      required={"procuring_entity_package_contract_id,first_name"},
 *     @SWG\Property(
 *          property="procuring_entity_package_contract_id",
 *          description="procuring_entity_package_contract_id",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="position_id",
 *          description="position_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="first_name",
 *          description="first_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="last_name",
 *          description="last_name",
 *          type="string"
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
 *      definition="PackageContractStaff",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="procuring_entity_package_contract_id",
 *          description="procuring_entity_package_contract_id",
 *          type="integer"
 *      ),
 *     @SWG\Property(
 *          property="position_id",
 *          description="position_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="first_name",
 *          description="first_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="last_name",
 *          description="last_name",
 *          type="string"
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
class PackageContractStaffs extends Model
{
    use SoftDeletes;

    public $table = 'package_contract_staffs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'position_id',
        'procuring_entity_package_contract_id',
        'first_name',
        'last_name',
        'remarks',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'position_id' => 'integer',
        'procuring_entity_package_contract_id' => 'integer',
        'first_name'=> 'string',
        'last_name'=> 'string',
        'remarks'=> 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function contract()
    {
        return $this->belongsTo(ProcuringEntityPackageContract::class, 'procuring_entity_package_contract_id');
    }

}
