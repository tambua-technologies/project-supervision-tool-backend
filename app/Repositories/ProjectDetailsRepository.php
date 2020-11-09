<?php

namespace App\Repositories;

use App\Models\ProjectDetails;
use App\Repositories\BaseRepository;

/**
 * Class ProjectDetailsRepository
 * @package App\Repositories
 * @version November 7, 2020, 10:56 am UTC
*/

class ProjectDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'status',
        'borrower',
        'implementing_agency_id',
        'funding_organisation_id',
        'coordinating_agency_id',
        'location_id',
        'total_project_cost_id',
        'approval_date',
        'approval_fy',
        'project_region',
        'closing_date',
        'environmental_category_id',
        'commitment_amount_id'
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
        return ProjectDetails::class;
    }
}
