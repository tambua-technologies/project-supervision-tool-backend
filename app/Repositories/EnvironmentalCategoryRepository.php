<?php

namespace App\Repositories;

use App\Models\EnvironmentalCategory;
use App\Repositories\BaseRepository;

/**
 * Class EnvironmentalCategoryRepository
 * @package App\Repositories
 * @version November 9, 2020, 11:05 am UTC
*/

class EnvironmentalCategoryRepository extends BaseRepository
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
        return EnvironmentalCategory::class;
    }
}
