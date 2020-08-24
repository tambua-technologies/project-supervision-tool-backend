<?php

namespace App\Repositories;

use App\Models\FundingOrganisation;
use App\Repositories\BaseRepository;

/**
 * Class FundingOrganisationRepository
 * @package App\Repositories
 * @version August 23, 2020, 12:20 pm UTC
*/

class FundingOrganisationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'website',
        'focal_person_id',
        'type'
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
        return FundingOrganisation::class;
    }
}
