<?php

namespace App\Repositories;

use App\Models\InitiativeType;
use App\Repositories\BaseRepository;

/**
 * Class InitiativeTypeRepository
 * @package App\Repositories
 * @version August 23, 2020, 12:16 pm UTC
*/

class InitiativeTypeRepository extends BaseRepository
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
        return InitiativeType::class;
    }
}
