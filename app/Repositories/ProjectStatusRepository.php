<?php

namespace App\Repositories;

use App\Models\ProjectStatus;
use App\Repositories\BaseRepository;

/**
 * Class FundingOrganisationRepository
 * @package App\Repositories
 * @version September 28, 2020, 11:29 am UTC
 */

class ProjectStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return ProjectStatus::class;
    }
}
