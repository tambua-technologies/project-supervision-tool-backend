<?php

namespace App\Imports\Packages;

use App\Models\PackageContractEquipment;
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

class CreatePackagesContractEquipment implements ToCollection,SkipsEmptyRows,WithHeadingRow
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

            PackageContractEquipment::updateOrCreate([
                'package_contract_id' => $contract->id,
                'equipment_name' => $data['equipment'],
                'quantity_as_per_contract' => $data['quantity_per_contract'],
                'mobilized' => $data['quantity_mobilized'],
                'total_available_now' => $data['equipment_status'],
                'status_of_equipment' => $data['remarks'],
            ]);
        });

    }
}
