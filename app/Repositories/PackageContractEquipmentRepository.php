<?php

namespace App\Repositories;

use App\Models\PackageContractEquipment;

/**
 * Class MoneyRepository
 * @package App\Repositories
 * @version November 9, 2020, 10:39 am UTC
 */

class PackageContractEquipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'package_contract_id',
        'equipment_name',
        'quantity_as_per_contract',
        'mobilized',
        'total_available_now',
        'status_of_equipment',
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
        return PackageContractEquipment::class;
    }
}
