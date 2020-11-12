<?php

namespace App\Repositories;

use App\Models\SubProject;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectRepository
 * @package App\Repositories
 * @version November 5, 2020, 12:23 pm UTC
*/

class SubProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'project_id',
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
        return SubProject::class;
    }
}
