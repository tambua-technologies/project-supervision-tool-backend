<?php

namespace App\Repositories;

use App\Models\ProjectSubComponent;

/**
 * Class ProjectSubComponentRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:54 am UTC
 */

class ProjectSubComponentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'project_component_id'
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
        return ProjectSubComponent::class;
    }
}
