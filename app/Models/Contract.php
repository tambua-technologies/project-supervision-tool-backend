<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'contract_no',
        'contractor_id',
        'supervising_agency_id',
        'procuring_entity_package_id',
        'contract_cost_id',
        'contract_time_id'
    ];

    protected $cast = [
        'id' => 'integer',
        'name' => 'string',
        'contract_no' => 'string',
        'contractor_id' => 'interger',
        'supervising_agency_id' => 'integer',
        'procuring_entity_package_id' => 'integer',
        'contract_cost_id' => 'integer',
        'contract_time_id' => 'integer'
    ];

    public static $rules = [];
}
