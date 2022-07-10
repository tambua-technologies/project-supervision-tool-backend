<?php

namespace App\Imports\ProcuringEntities;

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityContract;
use App\Models\ProcuringEntityPackage;
use App\Models\SafeguardConcern;
use App\Models\SubProject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreateSafeguardConcerns implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $collection)
    {

        $collection->map(function ($data) {
            // get procuring entity
            $procuringEntity = ProcuringEntity::getByName($data['procuring_entity'])->first();
            $package = ProcuringEntityPackage::where('name', $data['package'])
                ->where('procuring_entity_id', $procuringEntity->id)->first();
            $subProject = SubProject::where('procuring_entity_id', $procuringEntity->id)
                ->where('procuring_entity_package_id', $package->id)
                ->where('name', $data['sub_project'])->first();

            // create the contract
            SafeguardConcern::updateOrCreate([
                'procuring_entity_id' => $procuringEntity->id,
                'package_id' => $package->id,
                'sub_project_id' => $subProject->id,
                'issue' => $data['issue'],
                'concern_type' => Str::lower($data['concern_type'])
            ],
                [
                    'description' => $data['description'],
                    'commitment' => $data['commitment'],
                    'steps_taken' => $data['steps_taken'],
                    'challenges'=> $data['challenges'],
                    'mitigation_measures' => $data['mitigation_measures'],
                    'way_forward' => $data['way_forward']
                ]
            );
        });

    }
}
