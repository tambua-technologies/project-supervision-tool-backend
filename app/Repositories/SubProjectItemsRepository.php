<?php

namespace App\Repositories;

use App\Models\SubProjectItems;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectItemsRepository
 * @package App\Repositories
 * @version November 12, 2020, 11:31 am UTC
*/

class SubProjectItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quantity',
        'item_id',
        'sub_project_id'
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
        return SubProjectItems::class;
    }
}
