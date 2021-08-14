<?php

namespace App\Repositories;

use App\Models\Money;
use App\Models\PackageContractStaffs;
use App\Models\ProcuringEntityPackageContract;
use App\Repositories\BaseRepository;

/**
 * Class MoneyRepository
 * @package App\Repositories
 * @version November 9, 2020, 10:39 am UTC
 */

class PackageContractStaffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'position_id',
        'procuring_entity_package_contract_id',
        'first_name',
        'last_name',
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
        return PackageContractStaffs::class;
    }
}
