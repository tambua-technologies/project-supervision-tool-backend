<?php

namespace App\Repositories;

use App\Models\ProcuringEntityContract;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:28 am UTC
 */

class ProcuringEntityContractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'procuring_entity_id',
        'employer_id',
        'name',
        'contract_no',
        'original_contract_sum',
        'revised_contract_sum',
        'original_signing_date',
        'revised_signing_date',
        'commencement_date',
        'contract_period',
        'revised_end_date_of_contract',
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
        return ProcuringEntityContract::class;
    }
}
