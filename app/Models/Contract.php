<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * @SWG\Definition(
 *      definition="Contract",
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
class Contract extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'contract_no',
        'contractor_id',
        'supervising_agency_id',
        'procuring_entity_package_id',
        'contract_cost_id',
        'contract_time_id'
    ];

    protected $cast = [
        'id' => 'integer',
        'name' => 'string',
        'contract_no' => 'string',
        'contractor_id' => 'interger',
        'supervising_agency_id' => 'integer',
        'procuring_entity_package_id' => 'integer',
        'contract_cost_id' => 'integer',
        'contract_time_id' => 'integer'
    ];

    public static $rules = [];
}
