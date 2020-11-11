<?php

namespace App\Repositories;

use App\Models\ProjectTheme;
use App\Repositories\BaseRepository;

/**
 * Class ProjectThemeRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:54 am UTC
*/

class ProjectThemeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'theme_id',
        'percent'
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
        return ProjectTheme::class;
    }
}
