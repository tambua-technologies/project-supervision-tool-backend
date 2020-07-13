<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

/**
 * @SWG\Definition(
 *      definition="HumanResource",
 *      required={"quantity", "hr_type_id", "implementing_patner_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="end_date",
 *          description="end_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="meta",
 *          description="meta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location_id",
 *          description="location_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hr_type_id",
 *          description="hr_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="implementing_partners",
 *          description="implementing_partners",
 *          type="array",
 *          @SWG\Items(ref="#/definitions/ImplementingPartner")
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
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class HumanResource extends Model
{
    use SoftDeletes;

    public $table = 'human_resources';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'start_date',
        'end_date',
        'quantity',
        'description',
        'meta',
        'location_id',
        'hr_type_id',
        'implementing_partner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'quantity' => 'float',
        'description' => 'string',
        'meta' => 'string',
        'location_id' => 'integer',
        'hr_type_id' => 'integer',
        'implementing_partner_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quantity' => 'required',
        'hr_type_id' => 'required',
    ];

    /**
     * @return BelongsToMany
     **/
    public function implementing_partners()
    {
        return $this->belongsToMany(ImplementingPartner::class, 'human_resource_implementing_partner', 'human_resource_id', 'implementing_partner_id');
    }


    /**
     * @return BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * @return BelongsTo
     **/
    public function hr_type()
    {
        return $this->belongsTo(HRType::class, 'hr_type_id');
    }
}
