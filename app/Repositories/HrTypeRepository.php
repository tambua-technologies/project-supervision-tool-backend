<?php

namespace App\Repositories;

use App\Models\HRType;
use App\Repositories\BaseRepository;

/**
 * Class HrTypeRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:11 am UTC
*/

class HrTypeRepository extends BaseRepository
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
        return HRType::class;
    }
}
