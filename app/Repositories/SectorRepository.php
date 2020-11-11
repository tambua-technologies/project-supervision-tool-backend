<?php

namespace App\Repositories;

use App\Models\Sector;
use App\Repositories\BaseRepository;

/**
 * Class SectorRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:02 am UTC
*/

class SectorRepository extends BaseRepository
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
        return Sector::class;
    }
}
