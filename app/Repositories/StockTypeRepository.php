<?php

namespace App\Repositories;

use App\Models\StockType;
use App\Repositories\BaseRepository;

/**
 * Class StockTypeRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:28 am UTC
*/

class StockTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return StockType::class;
    }
}
