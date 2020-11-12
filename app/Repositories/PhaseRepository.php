<?php

namespace App\Repositories;

use App\Models\Phase;
use App\Repositories\BaseRepository;

/**
 * Class PhaseRepository
 * @package App\Repositories
 * @version November 12, 2020, 8:15 am UTC
*/

class PhaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Phase::class;
    }
}
