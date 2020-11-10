<?php

namespace App\Repositories;

use App\Models\Borrower;
use App\Repositories\BaseRepository;

/**
 * Class BorrowerRepository
 * @package App\Repositories
 * @version November 10, 2020, 10:59 am UTC
*/

class BorrowerRepository extends BaseRepository
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
        return Borrower::class;
    }
}
