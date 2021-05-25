<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Ticket",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
 *      )
 * )
 */
class Ticket extends Model
{
    use SoftDeletes;

    public $table = 'tickets';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'description',
        'location',
        'address',
        'ttr',
        'expected_at',
        'resolved_at',
        'agency_responsible_id',
        'priority_id',
        'operator_id',
        'assignee_id',
        'reporter_id',
        'ticket_reporting_method_id',
        'ticket_status_id',
        'ticket_type_id',
        'project_id',
        'component_id',
        'sub_component_id',
        'procuring_entity_id',
        'package_id',
        'sub_project_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'description' => 'string',
        'location' => 'object',
        'address' => 'string',
        'ttr' => 'float',
        'expected_at' => 'date',
        'resolved_at' => 'date',
        'agency_responsible_id' => 'integer',
        'priority_id' => 'integer',
        'operator_id' => 'integer',
        'assignee_id' => 'integer',
        'reporter_id' => 'integer',
        'ticket_reporting_method_id' => 'integer',
        'ticket_status_id' => 'integer',
        'ticket_type_id' => 'integer',
        'project_id' => 'integer',
        'component_id' => 'integer',
        'sub_component_id' => 'integer',
        'procuring_entity_id' => 'integer',
        'package_id' => 'integer',
        'sub_project_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
