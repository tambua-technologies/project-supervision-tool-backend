<?php

namespace App\Imports\Packages;

use App\Models\Contractor;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreatePackages implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $collection)
    {

        $collection->map(function($data)  {

            // get procuring entity id
            $procuring_entity = ProcuringEntity::getByName($data['procuring_entity'])->first();
            $procuring_entity_id = $procuring_entity->id;

            // create package
            $package = ProcuringEntityPackage::updateOrCreate([
                'name' => $data['package_name'],
                'procuring_entity_id' => $procuring_entity_id,
                'description' => $data['package_description']
            ]);

            // create contractor
            $contractor = Contractor::create([
                'name' => $data['contractor'],
                'address' => $data['contractor_address']
            ]);


            // create the contract
            ProcuringEntityPackageContract::create([
                'procuring_entity_package_id' => $package->id,
                'contractor_id' => $contractor->id,
                'name' => $data['contract_name'],
                'contract_no' => $data['contract_number'],
                'original_contract_sum' => ['amount' => $data['original_contract_sum'], 'currency' => $data['currency']],
                'date_contract_agreement_signed' => $data['date_contract_agreement_signed'],
                'date_possession_of_site_given' => $data['date_possession_of_site_given'],
                'date_of_commencement_of_works' => $data['date_of_commencement_of_works'],
                'date_of_end_of_mobilization_period' => $data['date_of_end_of_mobilization_period'],
                'date_of_contract_completion' => $data['end_date_of_contract'],
                'revised_date_of_contract_completion' => $data['revised_end_date_of_contract'],
            ]);

        });

    }
}
