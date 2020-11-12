<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\BaseRepository;

/**
 * Class ContractorRepository
 * @package App\Repositories
 * @version November 12, 2020, 8:28 am UTC
*/

class ContractorRepository extends BaseRepository
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
        return Contractor::class;
    }
}
