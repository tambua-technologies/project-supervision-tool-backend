<?php

namespace App\Repositories;

use App\Models\Money;
use App\Repositories\BaseRepository;

/**
 * Class MoneyRepository
 * @package App\Repositories
 * @version November 9, 2020, 10:39 am UTC
*/

class MoneyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'currency_id'
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
        return Money::class;
    }
}
