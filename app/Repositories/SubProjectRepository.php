<?php

namespace App\Repositories;

use App\Models\SubProject;

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
        'code',
        'geo_json',
        'description',
        'quantity',
        'procuring_entity_package_id',
        'project_id',
        'procuring_entity_id',
        'sub_project_type_id',
        'sub_project_status_id',
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
