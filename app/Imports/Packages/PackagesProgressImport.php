<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class PackagesProgressImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreatePackagesContractProgress()
        ];
    }


}
