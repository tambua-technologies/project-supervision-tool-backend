<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Stock",
 *      required={"quantity", "pace_of_production", "frequency", "stock_type_id", "location_id", "item_id", "agency_id", "emergency_response_theme_id"},
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
 *          property="pace_of_production",
 *          description="pace_of_production",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="frequency",
 *          description="frequency",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="meta",
 *          description="meta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="stock_status_id",
 *          description="stock_status_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="stock_type_id",
 *          description="stock_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="stock_group_cluster_id",
 *          description="stock_group_cluster_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="location_id",
 *          description="location_id",
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
 *          property="agency_id",
 *          description="agency_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="emergency_response_theme_id",
 *          description="emergency_response_theme_id",
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
class Stock extends Model
{
    use SoftDeletes;

    public $table = 'stocks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'start_date',
        'end_date',
        'quantity',
        'pace_of_production',
        'frequency',
        'meta',
        'stock_status_id',
        'stock_type_id',
        'stock_group_cluster_id',
        'location_id',
        'item_id',
        'agency_id',
        'emergency_response_theme_id'
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
        'pace_of_production' => 'float',
        'frequency' => 'float',
        'meta' => 'string',
        'stock_status_id' => 'integer',
        'stock_type_id' => 'integer',
        'stock_group_cluster_id' => 'integer',
        'location_id' => 'integer',
        'item_id' => 'integer',
        'agency_id' => 'integer',
        'emergency_response_theme_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quantity' => 'required',
        'pace_of_production' => 'required',
        'frequency' => 'required',
        'stock_type_id' => 'required',
        'location_id' => 'required',
        'item_id' => 'required',
        'agency_id' => 'required',
        'emergency_response_theme_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockStatus()
    {
        return $this->belongsTo(\App\Models\StockStatus::class, 'stock_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockType()
    {
        return $this->belongsTo(\App\Models\StockType::class, 'stock_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockGroupCluster()
    {
        return $this->belongsTo(\App\Models\StockGroupCluster::class, 'stock_group_cluster_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class, 'item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function emergencyResponseTheme()
    {
        return $this->belongsTo(\App\Models\EmergencyResponseTheme::class, 'emergency_response_theme_id');
    }
}
