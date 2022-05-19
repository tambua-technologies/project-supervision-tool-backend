<?php

namespace App\Imports\Packages;

use App\Models\PackageContractProgress;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreatePackagesContractProgress implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $collection)
    {

        $collection->map(function($data)  {

            // get procuring entity id
            $procuring_entity = ProcuringEntity::getByName($data['procuring_entity'])->first();
            $procuring_entity_id = $procuring_entity->id;
            $package = ProcuringEntityPackage::where('procuring_entity_id', $procuring_entity_id)
                ->where('name', $data['package'])->first();
            $contract = $package->contract->first();
            Log::info('package', [$contract]);



            PackageContractProgress::updateOrCreate([
                'package_contract_id' => $contract->id,
                'actual_physical_progress' => $data['actual_physical_progress'],
                'planned_physical_progress' => $data['planned_physical_progress'],
                'actual_financial_progress' => $data['actual_financial_progress'],
                'planned_financial_progress' => $data['planned_financial_progress'],
                'progress_date' => $data['date'],
            ]);


        });

    }
}
