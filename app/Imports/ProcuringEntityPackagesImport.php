<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;


class ProcuringEntityPackagesImport implements WithMultipleSheets,SkipsUnknownSheets
{

    public function sheets(): array
    {
        return [
            'package' => new FirstSheetImport()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
