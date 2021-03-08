<?php

namespace App\Repositories;

use App\Models\SubProjectSurvey;
use App\Repositories\BaseRepository;

/**
 * Class ImplementingPartnerRepository
 * @package App\Repositories
 * @version June 4, 2020, 6:07 am UTC
 */

class SubProjectSurveyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_name',
        'survey_id',
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
        return SubProjectSurvey::class;
    }
}
