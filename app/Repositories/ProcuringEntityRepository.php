<?php

namespace App\Repositories;

use App\Models\Position;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use App\Repositories\BaseRepository;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:28 am UTC
 */

class ProcuringEntityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_sub_component_id',
        'agency_id',
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
        return ProcuringEntity::class;
    }
}
