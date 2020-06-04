<?php

namespace App\Repositories;

use App\Models\StockGroupCluster;
use App\Repositories\BaseRepository;

/**
 * Class StockGroupClusterRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:50 am UTC
*/

class StockGroupClusterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'stock_group_cluster_id'
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
        return StockGroupCluster::class;
    }
}
