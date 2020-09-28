<?php

namespace App\Repositories;

use App\Models\FocalPerson;
use App\Repositories\BaseRepository;

/**
 * Class FocalPersonRepository
 * @package App\Repositories
 * @version September 28, 2020, 9:31 am UTC
*/

class FocalPersonRepository extends BaseRepository
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
        return FocalPerson::class;
    }
}
