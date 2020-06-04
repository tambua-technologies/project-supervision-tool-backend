<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\BaseRepository;

/**
 * Class UnitRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:02 am UTC
*/

class UnitRepository extends BaseRepository
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
        return Unit::class;
    }
}
