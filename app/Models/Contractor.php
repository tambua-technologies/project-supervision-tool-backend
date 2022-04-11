<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Contractor",
 *      required={"name"},
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
 *          property="address",
 *          description="address",
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
 *      ),
 * )
 */
class Contractor extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'address'
    ];

    public function contracts()
    {
        return $this->hasMany(ProcuringEntityPackageContract::class, 'contractor_id');
    }

}
