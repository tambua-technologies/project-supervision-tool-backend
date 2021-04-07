<?php

namespace App\Repositories;

use App\Models\SubProject;
use App\Models\SubProjectStatus;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectStatusRepository
 * @package App\Repositories
 * @version November 5, 2020, 12:23 pm UTC
 */

class SubProjectStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
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
        return SubProjectStatus::class;
    }
}