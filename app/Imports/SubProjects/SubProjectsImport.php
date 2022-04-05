<?php

namespace App\Imports\SubProjects;

use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use function info;


class SubProjectsImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreateSubProjects()
        ];
    }
}
