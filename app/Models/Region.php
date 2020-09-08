<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\DB;

/**
 * @SWG\Definition(
 *      definition="Region",
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
class Region extends Model
{

    public $table = 'regions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'geom',
        'adm0_pcode',
        'adm0_en',
        'adm0_sw',
        'adm0_sw',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

    public function getGeoJsonAttribute()
    {
        $geo_string = DB::table('regions')
            ->select(DB::raw('ST_AsGeoJSON(geom) AS geom'))
            ->where('id', '=', $this->id)
            ->first();
        return json_decode($geo_string->geom);
    }

}