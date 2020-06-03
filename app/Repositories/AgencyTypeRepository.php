<?php

namespace App\Repositories;

use App\Models\AgencyType;
use App\Repositories\BaseRepository;

/**
 * Class AgencyTypeRepository
 * @package App\Repositories
 * @version June 3, 2020, 10:26 pm UTC
*/

class AgencyTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return AgencyType::class;
    }
}
