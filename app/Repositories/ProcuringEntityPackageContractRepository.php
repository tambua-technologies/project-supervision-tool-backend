<?php

namespace App\Repositories;

use App\Models\ProcuringEntityPackageContract;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:28 am UTC
 */

class ProcuringEntityPackageContractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'procuring_entity_package_id',
        'contractor_id',
        'name',
        'contract_no',
        'original_contract_sum',
        'addendum_amount_to_the_contract',
        'revised_contract_sum',
        'date_contract_agreement_signed',
        'date_of_commencement_of_works',
        'date_possession_of_site_given',
        'date_of_end_of_mobilization_period',
        'date_of_contract_completion',
        'revised_date_of_contract_completion',
        'defects_liability_notification_period',
        'original_contract_period',
        'revised_contract_period',
        'actual_physical_progress',
        'planned_physical_progress',
        'financial_progress',
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
        return ProcuringEntityPackageContract::class;
    }
}
