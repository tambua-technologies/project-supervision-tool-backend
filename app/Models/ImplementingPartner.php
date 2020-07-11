<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasParent;


/**
 * @SWG\Definition(
 *      definition="ImplementingPartner",
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
        'website' => 'required',
        'focal_person_id' => 'required',
    ];

}
