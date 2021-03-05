<?php

namespace App\Repositories;

use App\Models\Progress;
use App\Repositories\BaseRepository;

/**
 * Class ProgressRepository
 * @package App\Repositories
 * @version November 13, 2020, 10:37 am UTC
*/

class ProgressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'planned',
        'actual',
        'ahead',
        'behind',
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
        return Progress::class;
    }
}
