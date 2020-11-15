<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubProjectEquipment",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="item_id",
 *          description="item_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity_per_contract",
 *          description="quantity_per_contract",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="quantity_mobilized",
 *          description="quantity_mobilized",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="remarks",
 *          description="remarks",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobilization_date",
 *          description="mobilization_date",
 *          type="string",
 *          format="date-time"
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
class SubProjectEquipment extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_equipments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'item_id',
        'sub_project_id',
        'quantity_per_contract',
        'quantity_mobilized',
        'remarks',
        'mobilization_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sub_project_id' => 'integer',
        'item_id' => 'integer',
        'quantity_per_contract' => 'double',
        'quantity_mobilized' => 'double',
        'remarks' => 'string',
        'mobilization_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
