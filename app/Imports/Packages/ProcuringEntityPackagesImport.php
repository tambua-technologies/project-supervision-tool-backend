<?php

namespace App\Imports\Packages;

use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use function info;


class ProcuringEntityPackagesImport implements WithMultipleSheets,SkipsUnknownSheets
{

    public function sheets(): array
    {
        return [
            'package' => new CreatePackages()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
