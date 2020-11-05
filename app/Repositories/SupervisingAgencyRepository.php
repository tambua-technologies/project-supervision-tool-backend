<?php

namespace App\Repositories;

use App\Models\SupervisingAgency;
use App\Repositories\BaseRepository;

/**
 * Class SupervisingAgencyRepository
 * @package App\Repositories
 * @version November 5, 2020, 3:41 pm UTC
*/

class SupervisingAgencyRepository extends BaseRepository
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
        return SupervisingAgency::class;
    }
}
