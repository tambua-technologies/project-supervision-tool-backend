<?php

namespace App\Repositories;

use App\Models\ContractTime;
use App\Repositories\BaseRepository;

/**
 * Class ContractTimeRepository
 * @package App\Repositories
 * @version November 14, 2020, 6:11 am UTC
*/

class ContractTimeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_date',
        'original_contract_period',
        'defects_liability_period',
        'time_extension_granted',
        'time_extension_applied_not_yet_granted',
        'intended_completion_date',
        'revised_completion_date',
        'time_percentage_lapsed_to_date'
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
        return ContractTime::class;
    }
}
