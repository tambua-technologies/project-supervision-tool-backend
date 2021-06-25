<?php

namespace App\Repositories;

use App\Models\Agency;

/**
 * Class AgencyRepository
 * @package App\Repositories
 * @version June 4, 2020, 6:07 am UTC
 */

class AgencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'website',
        'focal_person_id'
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
        return Agency::class;
    }
}
