<?php

namespace App\Repositories;

use App\Models\Stock;
use App\Repositories\BaseRepository;

/**
 * Class StockRepository
 * @package App\Repositories
 * @version June 4, 2020, 10:19 am UTC
*/

class StockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_date',
        'end_date',
        'quantity',
        'pace_of_production',
        'frequency',
        'meta',
        'stock_status_id',
        'stock_type_id',
        'stock_group_cluster_id',
        'location_id',
        'item_id',
        'agency_id',
        'emergency_response_theme_id'
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
        return Stock::class;
    }
}
