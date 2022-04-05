<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ProcuringEntityPackagesImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreatePackages()
        ];
    }


}
