<?php

namespace App\Repositories;

use App\Models\ProcuringEntityPackage;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:28 am UTC
 */

class ProcuringEntityPackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'procuring_entity_id',
        'project_component_id',
        'project_sub_component_id',
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
        return ProcuringEntityPackage::class;
    }
}
