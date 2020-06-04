<?php

namespace App\Repositories;

use App\Models\EmergencyResponseTheme;
use App\Repositories\BaseRepository;

/**
 * Class EmergencyResponseThemeRepository
 * @package App\Repositories
 * @version June 4, 2020, 9:57 am UTC
*/

class EmergencyResponseThemeRepository extends BaseRepository
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
        return EmergencyResponseTheme::class;
    }
}
