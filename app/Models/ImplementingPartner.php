<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasParent;


/**
 * @SWG\Definition(
 *      definition="ImplementingPartner",
 *      required={"name", "website", "focal_person_id"},
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
 * )
 */
class ImplementingPartner extends Agency
{
    use SoftDeletes, HasParent;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'focal_person_id' => 'required',
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
        'focal_person_id' => 'integer'
    ];


    /**
     * @return BelongsTo
     **/
    public function focalPerson()
    {
        return $this->belongsTo(FocalPerson::class, 'focal_person_id');
    }

}
