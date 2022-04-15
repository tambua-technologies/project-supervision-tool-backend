<?php

namespace App\Imports\ProcuringEntities;

use App\Models\Contractor;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityContract;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreateProcuringEntityContracts implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $collection)
    {

        $collection->map(function ($data) {
            // get procuring entity
            $procuringEntity = ProcuringEntity::getByName($data['procuring_entity'])->first();
            Log::info('end date', [$data['end_date']]);



            // create the contract
            ProcuringEntityContract::create([
                'procuring_entity_id' => $procuringEntity->id,
                'name' => $data['contract_name'],
                'contract_no' => $data['contract_no'],
                'original_contract_sum' => ['amount' => $data['original_contract_sum'], 'currency' => $data['currency']],
                'revised_contract_sum' => ['amount' => $data['original_contract_sum'], 'currency' => $data['currency']],
                'original_signing_date'=> $data['addendum_signing_date'],
                'commencement_date' => $data['commencement_date'],
                'consortium_name' => $data['consortium_name'],
                'end_date_of_contract' => $data['end_date']
            ]);
        });

    }
}
