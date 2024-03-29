<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SafeguardConcern",
 *      @SWG\Property(
 *          property="package",
 *          description="package",
 *          type="object"
 *      ),
 *     @SWG\Property(
 *          property="sub_project",
 *          description="sub-project",
 *          type="object"
 *      ),
 *      @SWG\Property(
 *          property="concern_type",
 *          description="concern type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="issue",
 *          description="issue",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="commitment",
 *          description="commitment",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="steps_taken",
 *          description="steps_taken",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="challenges",
 *          description="challenges",
 *          type="string"
 *      ),
 *     @SWG\Property(
 *          property="mitigation_mesures",
 *          description="mitigation_measures",
 *          type="string"
 *      )
 * )
 */
class SafeguardConcern extends Model
{
    use SoftDeletes;

    public $table = 'safeguard_concerns';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'package_id',
        'concern_type',
        'description',
        'way_forward',
        'sub_project_id',
        'procuring_entity_id',
        'issue',
        'commitment',
        'steps_taken',
        'challenges',
        'mitigation_measures',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_id' => 'integer',
        'sub_project_id' => 'integer',
        'procuring_entity_id' => 'integer',
        'concern_type' => 'string',
        'description' => 'string',
        'way_forward' => 'string',
        'issue' => 'string',
        'commitment' => 'string',
        'steps_taken' => 'string',
        'challenges' => 'string',
        'mitigation_measures' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    public function procuringEntity()
    {
        return $this->belongsTo(ProcuringEntity::class);
    }

    public function package()
    {
        return $this->belongsTo(ProcuringEntityPackage::class);
    }

    public function subProject()
    {
        return $this->belongsTo(SubProject::class);
    }


}
