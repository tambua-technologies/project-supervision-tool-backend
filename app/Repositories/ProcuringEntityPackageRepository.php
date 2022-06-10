<?php

namespace App\Repositories;

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version November 13, 2020, 11:28 am UTC
 */
class ProcuringEntityPackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'procuring_entity_id',
        'project_component_id',
        'project_sub_component_id',
        'name',
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


    public function find($id, $columns = ['*'])
    {
        $childCount = 4;
        return ProcuringEntityPackage::where('id', $id)
            ->with([


                'subProjects' => function ($query) use ($childCount) {
                    return $query->select([
                        'procuring_entity_package_id',
                        'sub_project_type_id',
                        'id',
                        'name'
                    ])
                        ->with(['type'])
                        ->take($childCount);
                },


                'equipments' => function ($query) use ($childCount) {
                    return $query->take($childCount);
                },


                'staffs' => function ($query) use ($childCount) {
                    return $query->with('position')->take($childCount);
                },


                'safeguardConcerns' => function ($query) use ($childCount) {
                    return $query->take($childCount);
                },

                'contract' => fn($q) => $q->with(['contractor'])
            ])
            ->first();

    }

    public function createChallenge(ProcuringEntityPackage $package, $input) {
        return $package->challenges()->create($input);

    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProcuringEntityPackage::class;
    }
}
