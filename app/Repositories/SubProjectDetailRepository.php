<?php

namespace App\Repositories;

use App\Models\SubProjectDetail;
use App\Repositories\BaseRepository;

/**
 * Class SubProjectDetailRepository
 * @package App\Repositories
 * @version November 12, 2020, 8:43 am UTC
*/

class SubProjectDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'actor_id',
        'supervising_consultant_id',
        'phase_id',
        'start_date',
        'end_date',
        'contractor_id'
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
        return SubProjectDetail::class;
    }
}
