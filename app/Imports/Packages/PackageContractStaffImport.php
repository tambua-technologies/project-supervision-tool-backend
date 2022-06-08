<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class PackageContractStaffImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreatePackagesContractStaff()
        ];
    }


}
