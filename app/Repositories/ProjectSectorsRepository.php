<?php

namespace App\Repositories;

use App\Models\ProjectSectors;
use App\Repositories\BaseRepository;

/**
 * Class ProjectSectorsRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:50 am UTC
*/

class ProjectSectorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sector_id',
        'project_id',
        'percent'
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
        return ProjectSectors::class;
    }
}
