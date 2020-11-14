<?php

namespace App\Repositories;

use App\Models\ContractCost;
use App\Repositories\BaseRepository;

/**
 * Class ContractCostRepository
 * @package App\Repositories
 * @version November 14, 2020, 6:52 am UTC
*/

class ContractCostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'contract_award_value_id',
        'certified_work_to_date_value_id',
        'works_certified_to_date_percentage',
        'financial_penalties_applied_value_id',
        'financial_penalties_granted_value_id',
        'variations_granted_value_id',
        'variations_applied_not_yet_granted_value_id',
        'estimated_final_contract_price_id'
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
        return ContractCost::class;
    }
}
