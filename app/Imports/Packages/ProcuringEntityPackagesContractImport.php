<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ProcuringEntityPackagesContractImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreatePackageContracts()
        ];
    }


}
