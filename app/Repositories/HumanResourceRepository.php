<?php

namespace App\Repositories;

use App\Models\HumanResource;
use App\Repositories\BaseRepository;

/**
 * Class HumanResourceRepository
 * @package App\Repositories
 * @version June 10, 2020, 6:13 pm UTC
*/

class HumanResourceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_date',
        'end_date',
        'quantity',
        'meta',
        'location_id',
        'item_id',
        'agency_id'
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
