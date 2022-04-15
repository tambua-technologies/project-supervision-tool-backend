<?php

namespace App\Imports\ProcuringEntities;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ProcuringEntityContractImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new CreateProcuringEntityContracts()
        ];
    }


}
