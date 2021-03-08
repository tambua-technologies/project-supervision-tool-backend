<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;



/**
 * @SWG\Definition(
 *      definition="SubProjectSurveyPayload",
 *      required={"survey_id", "category_name", "sub_project_id"},
 *      @SWG\Property(
 *          property="survey_id",
 *          description="survey_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="category_name",
 *          description="category_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */


/**
 * @SWG\Definition(
 *      definition="SubProjectSurvey",
 *      @SWG\Property(
 *          property="survey_id",
 *          description="survey_id",
 *          type="survey_id"
 *      ),
 *      @SWG\Property(
 *          property="category_name",
 *          description="category_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sub_project_id",
 *          description="sub_project_id",
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
 *      )
 * )
 */
class SubProjectSurvey extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_surveys';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'category_name',
        'survey_id',
        'sub_project_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_name' => 'string',
        'survey_id' => 'string',
        'sub_project_id' => 'string',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'category_name' => 'required|string',
        'sub_project_id' => 'required',
        'survey_id' => 'required|string',
    ];

    public function sub_project()
    {
        return $this->belongsTo(SubProject::class);
    }

}
