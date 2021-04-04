<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\BaseRepository;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version November 5, 2020, 12:01 pm UTC
*/

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'code',
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
        return Project::class;
    }
}
