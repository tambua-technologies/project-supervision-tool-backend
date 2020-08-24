<?php

namespace App\Repositories;

use App\Models\ActorType;
use App\Repositories\BaseRepository;

/**
 * Class ActorTypeRepository
 * @package App\Repositories
 * @version August 23, 2020, 12:09 pm UTC
*/

class ActorTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'description'
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
        return ActorType::class;
    }
}
