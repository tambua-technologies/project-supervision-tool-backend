<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Challenge",
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
 *          property="way_forward",
 *          description="way_forward",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="entity_id",
 *          description="entity_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Challenge extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'way_forward',
        'entity_id',
        'entity_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'name' => 'string',
        'way_forward' => 'string',
        'entity_type' => 'string',
    ];

   public function entity(): MorphTo
   {
       return $this->morphTo(__FUNCTION__, 'entity_type', 'entity_id');
   }

}
