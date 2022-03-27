<?php

namespace App\Imports;

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FirstSheetImport implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $rows)
    {

        $rows->map(function($data)  {

            // get procuring entity id
            $procuring_entity = ProcuringEntity::join('agencies','procuring_entities.agency_id', 'agencies.id' )
                ->select('procuring_entities.*')
                ->where('agencies.name', 'ilike', $data['procuring_entity'])->first();
            $procuring_entity_id = $procuring_entity->id;

            // create package
            ProcuringEntityPackage::create([
                'name' => $data['package_name'],
                'description' => $data['package_description'],
                'procuring_entity_id' => $procuring_entity_id
            ]);

        });

    }
}
