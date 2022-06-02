<?php

namespace App\Repositories;

use App\Models\Webhook;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 12, 2020, 6:57 am UTC
 */

class WebhooksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'payload'
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
        return Webhook::class;
    }
}
