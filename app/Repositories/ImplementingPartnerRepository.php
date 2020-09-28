<?php

namespace App\Repositories;

use App\Models\ImplementingPartner;
use App\Repositories\BaseRepository;

/**
 * Class ImplementingPartnerRepository
 * @package App\Repositories
 * @version September 28, 2020, 10:11 am UTC
*/

class ImplementingPartnerRepository extends BaseRepository
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
        return ImplementingPartner::class;
    }
}
