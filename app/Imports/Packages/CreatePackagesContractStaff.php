<?php

namespace App\Imports\Packages;

use App\Models\PackageContractProgress;
use App\Models\PackageContractStaffs;
use App\Models\Position;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreatePackagesContractStaff implements ToCollection,SkipsEmptyRows,WithHeadingRow
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

            $position = Position::updateOrCreate([
                'name' => $data['position'],
                'description' => $data['position']
            ]);

            PackageContractStaffs::updateOrCreate([
                'procuring_entity_package_contract_id' => $contract->id,
                'proposed_name' => $data['proposed_name'],
                'replacement' => $data['replacement'],
                'position_id' => $position->id,
                'remarks' => $data['remarks']
            ]);
        });

    }
}
