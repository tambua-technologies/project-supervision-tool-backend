<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\DB;

/**
 * @SWG\Definition(
 *      definition="District",
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string",
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * )
 */
class District extends Model
{

    public $table = 'districts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adm0_pcode',
        'adm0_en',
        'adm1_en',
        'adm0_sw',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'region_id' => 'string',
        'geom' => 'object',
    ];
}
