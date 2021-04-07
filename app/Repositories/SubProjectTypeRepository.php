<?php

namespace App\Repositories;

use App\Models\SubProjectType;
use App\Repositories\BaseRepository;

/**
 * Class ImplementingPartnerRepository
 * @package App\Repositories
 * @version June 4, 2020, 6:07 am UTC
 */

class SubProjectTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'unit_id'
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
        return SubProjectType::class;
    }
}
