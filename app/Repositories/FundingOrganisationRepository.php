<?php

namespace App\Repositories;

use App\Models\FundingOrganisation;
use App\Repositories\BaseRepository;

/**
 * Class FundingOrganisationRepository
 * @package App\Repositories
 * @version September 28, 2020, 11:29 am UTC
*/

class FundingOrganisationRepository extends BaseRepository
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
        return FundingOrganisation::class;
    }
}
