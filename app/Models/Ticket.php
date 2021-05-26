<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Ticket",
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location",
 *          description="location",
 *          type="object",
 *           ref="#/definitions/GeoJSON"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ticket_type_id",
 *          description="ticket_type_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_status_id",
 *          description="ticket_status_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="agency_responsible_id",
 *          description="agency_responsible_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="operator_id",
 *          description="operator_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="assignee_id",
 *          description="assignee_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="reporter_id",
 *          description="reporter_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="ticket_reporting_method_id",
 *          description="ticket_reporting_method_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="component_id",
 *          description="component_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="sub_component_id",
 *          description="sub_component_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="procuring_entity_id",
 *          description="procuring_entity_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="package_id",
 *          description="package_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer"
 *      ),
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
