<?php

namespace App\Repositories;

use App\Models\Theme;
use App\Repositories\BaseRepository;

/**
 * Class ThemeRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:08 am UTC
*/

class ThemeRepository extends BaseRepository
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
        return Theme::class;
    }
}
