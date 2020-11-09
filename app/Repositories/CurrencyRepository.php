<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\BaseRepository;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 * @version November 9, 2020, 10:35 am UTC
*/

class CurrencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'iso'
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
        return Currency::class;
    }
}
