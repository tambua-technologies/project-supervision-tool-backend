<?php

namespace App\Repositories;

use App\Models\SubProjectEquipment;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectEquipmentRepository
 * @package App\Repositories
 * @version November 13, 2020, 10:22 am UTC
*/

class SubProjectEquipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'quantity_per_contract',
        'quantity_mobilized',
        'remarks',
        'mobilization_date'
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
        return SubProjectEquipment::class;
    }
}
