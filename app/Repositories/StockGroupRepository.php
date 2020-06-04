<?php

namespace App\Repositories;

use App\Models\StockGroup;
use App\Repositories\BaseRepository;

/**
 * Class StockGroupRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:44 am UTC
*/

class StockGroupRepository extends BaseRepository
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
        return StockGroup::class;
    }
}
