<?php

namespace App\Imports\SubProjects;

use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use function info;


class SubProjectsImport implements WithMultipleSheets,SkipsUnknownSheets
{

    public function sheets(): array
    {
        return [
            'sub_projects' => new CreateSubProjects()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
