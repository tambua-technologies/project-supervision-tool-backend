<?php

namespace App\Repositories;

use App\Models\CoordinatingAgency;
use App\Repositories\BaseRepository;

/**
 * Class CoordinatingAgencyRepository
 * @package App\Repositories
 * @version November 7, 2020, 9:00 am UTC
*/

class CoordinatingAgencyRepository extends BaseRepository
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
        return CoordinatingAgency::class;
    }
}
