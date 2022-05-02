<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="ProcuringEntityReport",
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *     @SWG\Property(
 *          property="procuring_entity_id",
 *          description="procuring_entity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="report_title",
 *          description="report_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="summary",
 *          description="summary",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="report_number",
 *          description="report_number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start",
 *          description="start",
 *          type="string",
 *          format="date-time"
 *      ), @SWG\Property(
 *          property="end",
 *          description="end",
 *          type="string",
 *          format="date-time"
 *      ),
 *     @SWG\Property(
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
class ProcuringEntityReport extends Model
{
    use SoftDeletes;

    public $fillable = [
        'report_title',
        'summary',
        'report_number',
        'start',
        'end',
        'procuring_entity_id'
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'report_title' => 'string',
        'procuring_entity_id' => 'integer',
        'report_number' => 'integer',
        'period' => 'string',
        'end' => 'date',
        'start' => 'date'
    ];




    public function procuringEntity()
    {
        return $this->belongsTo(ProcuringEntity::class, 'procuring_entity_id');
    }

}
