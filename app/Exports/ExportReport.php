<?php

namespace App\Exports;

use App\Models\ProcuringEntityContract;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportReport
{

    /**
     * @throws \PhpOffice\PhpWord\Exception\CopyFileException
     * @throws CreateTemporaryFileException
     */
    public static function create()
    {

        $templateProcessor = new TemplateProcessor(resource_path('csc_monthly_monitoring_reports_template.docx'));

        // fill the Executive section
        $executiveSummary = 'This report forms part of
No.LGA/016/TMC/2015/2016/W/DMDP/01 for Temeke Municipal Council (TMC) project financed by World Bank. The project named as Construction Supervision of Infrastructure Components in Temeke Municipality under the Dar es Salaam Metropolitan Development Project (DMDP).
This is the Supervision Consultant’s Progress Report No.59 which provides an update on the Contractor`s and the Consultant`s activities undertaken during the reporting period; 1st May,2021to 31st May, 2021';
        $templateProcessor->setValue('reportNumber', '70');
        $templateProcessor->setValue('reportStartDate', '01/03/2022');
        $templateProcessor->setValue('reportEndDate', '30/03/2022');
        $templateProcessor->setValue('executiveSummary', $executiveSummary);


        // get contract
        $contract = ProcuringEntityContract::first();
        $revised_contract_sum = $contract->revised_contract_sum->amount . ' ' . $contract->revised_contract_sum->currency;
        $original_contract_sum = $contract->original_contract_sum->amount . ' ' . $contract->original_contract_sum->currency;

        // fill contract information
        $procuringEntity = $contract->procuringEntity()->first();
        $project = $procuringEntity->project()->first();

        $templateProcessor->setValue('projectName', $project->name);
        $templateProcessor->setValue('contractName', $contract->name);
        $templateProcessor->setValue('contractNumber', $contract->contract_no);
        $templateProcessor->setValue('consultantName', $contract->consortium_name);
        $templateProcessor->setValue('procuringEntity', $procuringEntity->agency()->first()->name);
        $templateProcessor->setValue('originalContractSum', $original_contract_sum);
        $templateProcessor->setValue('revisedContractSum', $revised_contract_sum);
        $templateProcessor->setValue('addendumSigningDate', $contract->original_signing_date);
        $templateProcessor->setValue('contractCommencementDate', $contract->commencement_date);
        $templateProcessor->setValue('contractEndDate', $contract->end_date_of_contract);

        $templateProcessor->saveAs(storage_path('monthly_report.docx'));
    }
}

