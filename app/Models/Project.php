<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ProjectPayload",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="leaders",
 *          description="leaders",
 *          @SWG\Items(type="integer")
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


/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
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
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function leaders()
    {
        return $this->belongsToMany(FocalPerson::class, 'project_leaders', 'project_id', 'leader_id');
    }

    public function removeDuplicateIds($arr)
    {
        $attachedIds = $this->leaders()->get()->pluck(['id']);
        $collection = collect($arr);
        return $collection->diff($attachedIds);
    }

    public function attachLeaders($leaders)
    {
        $leadersToAttach = $this->removeDuplicateIds($leaders);
        $this->leaders()->attach($leadersToAttach);
    }

    public function details()
    {
        return $this->hasOne(ProjectDetails::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'project_themes', 'project_id', 'theme_id')->as('details')->withPivot('percent');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'project_sectors', 'project_id', 'sector_id')->as('details')->withPivot('percent');
    }

    public function sub_projects()
    {
        return $this->hasMany(SubProject::class);
    }

}
