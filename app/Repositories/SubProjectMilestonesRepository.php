<?php

namespace App\Repositories;

use App\Models\SubProjectMilestones;

/**
 * Class SubProjectMilestonesRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:56 am UTC
*/

class SubProjectMilestonesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'quantity',
        'is_measurable',
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
        return SubProjectMilestones::class;
    }
}
