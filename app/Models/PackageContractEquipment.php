<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PackageContractEquipmentPayload",
 *      required={"package_contract_id,equipment_name"},
 *     @SWG\Property(
 *          property="package_contract_id",
 *          description="package_contract_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="equipment_name",
 *          description="equipment_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity_as_per_contract",
 *          description="quantity_as_per_contract",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="mobilized",
 *          description="mobilized",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="total_available_now",
 *          description="total_available_now",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="status_of_equipment",
 *          description="status_of_equipment",
 *          type="string"
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="PackageContractEquipment",
 *     @SWG\Property(
 *          property="package_contract_id",
 *          description="package_contract_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="equipment_name",
 *          description="equipment_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity_as_per_contract",
 *          description="quantity_as_per_contract",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="mobilized",
 *          description="mobilized",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="total_available_now",
 *          description="total_available_now",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="status_of_equipment",
 *          description="status_of_equipment",
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
class PackageContractEquipment extends Model
{
    use SoftDeletes;

    public $table = 'package_contract_equipments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'package_contract_id',
        'equipment_name',
        'quantity_as_per_contract',
        'mobilized',
        'total_available_now',
        'status_of_equipment',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mobilized' => 'integer',
        'package_contract_id' => 'integer',
        'equipment_name' => 'string',
        'quantity_as_per_contract' => 'integer',
        'total_available_now' => 'integer',
        'status_of_equipment' => 'string',
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
