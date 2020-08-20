<?php

namespace App\Repositories;

use App\Models\Initiative;
use App\Repositories\BaseRepository;

/**
 * Class InitiativeRepository
 * @package App\Repositories
 * @version August 20, 2020, 8:29 pm UTC
*/

class InitiativeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'meta',
        'location_id',
        'actor_type_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Initiative::class;
    }
}
