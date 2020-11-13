<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Progress",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="planned",
 *          description="planned",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="actual",
 *          description="actual",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="ahead",
 *          description="ahead",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="behind",
 *          description="behind",
 *          type="number",
 *          format="number"
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
class Progress extends Model
{
    use SoftDeletes;

    public $table = 'progress';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'planned',
        'actual',
        'ahead',
        'behind'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'planned' => 'float',
        'actual' => 'float',
        'ahead' => 'float',
        'behind' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
