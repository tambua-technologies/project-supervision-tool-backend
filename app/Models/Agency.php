<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasChildren;

/**
 * @SWG\Definition(
 *      definition="Agency",
 *      required={"name", "website", "focal_person_id", "agency_type_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="website",
 *          description="website",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="focal_person_id",
 *          description="focal_person_id",
 *          type="integer",
 *          format="int32"
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
class Agency extends Model
{
    use SoftDeletes, HasChildren;

    public $table = 'agencies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'website',
        'focal_person_id',
        'agency_type_id',
        'type'
    ];

    protected $childTypes = [
        'implementing_partner' => ImplementingPartner::class,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'website' => 'string',
        'type' => 'string',
        'focal_person_id' => 'integer',
        'agency_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'website' => 'required',
        'focal_person_id' => 'required',
        'agency_type_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function focalPerson()
    {
        return $this->belongsTo(\App\Models\FocalPerson::class, 'focal_person_id');
    }

}
