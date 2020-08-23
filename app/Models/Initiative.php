<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Initiative",
 *      required={"title"},
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
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="meta",
 *          description="meta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location_id",
 *          description="location_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="actor_type_id",
 *          description="actor_type_id",
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
class Initiative extends Model
{
    use SoftDeletes;

    public $table = 'initiatives';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'meta',
        'location_id',
        'actor_type_id',
        'initiative_type_id',
        'focal_person_id',
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
        'title' => 'string',
        'description' => 'string',
        'meta' => 'string',
        'location_id' => 'integer',
        'actor_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * @return BelongsTo
     **/
    public function focalPerson()
    {
        return $this->belongsTo(FocalPerson::class, 'focal_person_id');
    }

    /**
     * @return BelongsTo
     **/
    public function actorType()
    {
        return $this->belongsTo(ActorType::class, 'actor_type_id');
    }

    /**
     * @return BelongsTo
     **/
    public function initiativeType()
    {
        return $this->belongsTo(InitiativeType::class, 'initiative_type_id');
    }

    /**
     * @return BelongsToMany
     **/
    public function implementing_partners()
    {
        return $this->belongsToMany(ImplementingPartner::class, 'implementing_partner_initiative', 'initiative_id', 'implementing_partner_id');
    }

    /**
     * @return BelongsToMany
     **/
    public function funding_organisations()
    {
        return $this->belongsToMany(FundingOrganisation::class, 'funding_organisation', 'initiative_id', 'funding_organisation_id');
    }
}
