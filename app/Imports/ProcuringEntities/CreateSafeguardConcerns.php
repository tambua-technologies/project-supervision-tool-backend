<?php

namespace App\Imports\ProcuringEntities;

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityContract;
use App\Models\ProcuringEntityPackage;
use App\Models\SafeguardConcern;
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

            // create the contract
            SafeguardConcern::create([
                'procuring_entity_id' => $procuringEntity->id,
                'package_id' => $package->id ?? null,
                'issue' => $data['issue'],
                'description' => $data['description'],
                'commitment' => $data['commitment'],
                'steps_taken' => $data['steps_taken'],
                'challenges'=> $data['challenges'],
                'mitigation_measures' => $data['mitigation_measures'],
                'way_forward' => $data['way_forward'],
                'concern_type' => Str::lower($data['concern_type'])
            ]);
        });

    }
}
