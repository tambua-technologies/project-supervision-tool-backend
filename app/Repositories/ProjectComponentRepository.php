<?php

namespace App\Repositories;

use App\Models\ProjectComponent;

/**
 * Class ProjectComponentRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:54 am UTC
 */

class ProjectComponentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'project_id'
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
        return ProjectComponent::class;
    }
}
