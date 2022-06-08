<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class PackageContractEquipmentImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreatePackagesContractEquipment()
        ];
    }


}
