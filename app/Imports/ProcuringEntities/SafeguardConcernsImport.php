<?php

namespace App\Imports\ProcuringEntities;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class SafeguardConcernsImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreateSafeguardConcerns()
        ];
    }


}
