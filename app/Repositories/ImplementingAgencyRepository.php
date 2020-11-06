<?php

namespace App\Repositories;

use App\Models\ImplementingAgency;
use App\Repositories\BaseRepository;

/**
 * Class ImplementingAgencyRepository
 * @package App\Repositories
 * @version November 5, 2020, 4:10 pm UTC
*/

class ImplementingAgencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return ImplementingAgency::class;
    }
}
