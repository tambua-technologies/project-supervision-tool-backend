<?php

namespace App\Repositories;

use App\Models\TicketPriority;


/**
 * Class ThemeRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:08 am UTC
 */

class TicketPriorityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'weight',
        'color',
        'description',
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
        return TicketPriority::class;
    }
}
