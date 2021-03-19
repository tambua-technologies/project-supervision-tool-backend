<?php

namespace App\Repositories;

use App\Models\SubProjectContract;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectContractRepository
 * @package App\Repositories
 * @version November 14, 2020, 7:02 am UTC
*/

class SubProjectContractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'sub_project_id',
        'contract_cost_id',
        'contract_time_id',
        'contractor_id'
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
        return SubProjectContract::class;
    }
}
