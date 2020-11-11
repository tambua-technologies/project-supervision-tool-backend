<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProjectSectors",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sector_id",
 *          description="sector_d",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="percent",
 *          description="percent",
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
class ProjectSectors extends Model
{
    use SoftDeletes;

    public $table = 'project_sectors';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sector_id',
        'project_id',
        'percent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'percent' => 'float',
        'sector_id' => 'integer',
        'project_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
