<?php

namespace App\Repositories;

use App\Models\PackageContractFinancial;

/**
 * Class MoneyRepository
 * @package App\Repositories
 * @version November 9, 2020, 10:39 am UTC
 */

class PackageContractFinancialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'package_contract_id',
        'invoice_no',
        'particulars',
        'amount',
        'remarks',
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
        return PackageContractFinancial::class;
    }
}
