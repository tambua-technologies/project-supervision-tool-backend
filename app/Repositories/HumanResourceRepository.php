<?php

namespace App\Repositories;

use App\Models\HumanResource;
use App\Repositories\BaseRepository;

/**
 * Class HumanResourceRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:24 am UTC
*/

class HumanResourceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'position_id',
        'quantity'
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
        return HumanResource::class;
    }
}
