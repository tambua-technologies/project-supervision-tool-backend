<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubProjectItems",
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
 *          property="locations",
 *          description="locations",
 *          @SWG\Items(type="integer")
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="progress_id",
 *          description="progress_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
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
class SubProjectItems extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_items';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'quantity',
        'name',
        'description',
        'item_id',
        'sub_project_id',
        'progress_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quantity' => 'double',
        'name' => 'string',
        'description' => 'string',
        'item_id' => 'integer',
        'sub_project_id' => 'integer',
        'progress_id' => 'integer',
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

    public function sub_project()
    {
        return $this->belongsTo(SubProject::class);
    }

    public function progress()
    {
        return $this->belongsTo(Progress::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class,'sub_project_item_location','sub_project_item_id', 'location_id');
    }

}
