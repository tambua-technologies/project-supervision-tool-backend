<?php

namespace App\Repositories;

use App\Models\FocalPerson;
use App\Repositories\BaseRepository;

/**
 * Class FocalPersonRepository
 * @package App\Repositories
 * @version June 3, 2020, 6:52 pm UTC
*/

class FocalPersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'email',
        'password'
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
