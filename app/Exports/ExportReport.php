<?php

namespace App\Exports;

use App\Models\ProcuringEntityContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportReport
{

    /**
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public static function create()
    {
        Settings::setOutputEscapingEnabled(true);

        $templateProcessor = new TemplateProcessor(resource_path('csc_monthly_monitoring_reports_template.docx'));


        // fill report title
        $reportTitle = 'Construction Supervision Consultant Monthly Progress Report';
        $templateProcessor->setValue('reportTitle', $reportTitle);

        // fill the Executive section
        $executiveSummary = 'This report forms part of
No.LGA/016/TMC/2015/2016/W/DMDP/01 for Temeke Municipal Council (TMC) project financed by World Bank. The project named as Construction Supervision of Infrastructure Components in Temeke Municipality under the Dar es Salaam Metropolitan Development Project (DMDP).
This is the Supervision Consultant’s Progress Report No.59 which provides an update on the Contractor`s and the Consultant`s activities undertaken during the reporting period; 1st May,2021to 31st May, 2021';
        $templateProcessor->setValue('reportNumber', '70');
        $templateProcessor->setValue('reportStartDate', '01/03/2022');
        $templateProcessor->setValue('reportEndDate', '30/03/2022');
        $templateProcessor->setValue('executiveSummary', $executiveSummary);



        // get contract
        $contract = ProcuringEntityContract::where('procuring_entity_id', 1)->first();
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


        // fill works summary section
        $worksSummaryQuery = "select p.name package,
       pepc.name contract,
       pepc.original_contract_sum contractcost,
       c.name contractor
from procuring_entity_packages p
join procuring_entity_package_contracts pepc on p.id = pepc.procuring_entity_package_id
join contractors c on c.id = pepc.contractor_id
where p.procuring_entity_id = $procuringEntity->id";


        $worksSummary = collect(DB::select($worksSummaryQuery));

        $works = $worksSummary->map(function ($work) {
            $cost = json_decode($work->contractcost);
            $contractCost = $cost->amount . ' ' .  $cost->currency;
            return [
                'package' => $work->package,
                'contract' => $work->contract,
                'contractor' => $work->contractor,
                'contractCost' => $contractCost
            ];
        });

        $templateProcessor->cloneRowAndSetValues('package', $works->all());


        // fill construction progress summary
        $constructionProgressSummaryQuery  = "select *

    from (select pep.name package,
                 pep.procuring_entity_id,
                 c.name contractor,
                 pe_contracts.date_of_commencement_of_works,
                 pe_contracts.date_of_contract_completion,
                 pe_contracts.revised_date_of_contract_completion,
                 pe_contracts.id id

        from  procuring_entity_package_contracts pe_contracts

                  join contractors c on c.id = pe_contracts.contractor_id
                  join procuring_entity_packages pep on pep.id = pe_contracts.procuring_entity_package_id) contracts
left join (SELECT  pcp.package_contract_id,
                  pcp.actual_financial_progress,
                  pcp.actual_physical_progress,
                  pcp.planned_physical_progress

           FROM procuring_entity_package_contracts pepc
                    JOIN (
               SELECT DISTINCT ON (package_contract_id) *
               FROM package_contract_progress pcp
               ORDER BY package_contract_id, progress_date DESC
           ) pcp ON pcp.package_contract_id = pepc.id) progress on contracts.id = progress.package_contract_id
           where procuring_entity_id = $procuringEntity->id";

        $constructionProgressSummary = collect(DB::select($constructionProgressSummaryQuery));

        $worksProgress = $constructionProgressSummary->map(function ($workProgress) {

            // time elapsed
            $now = Carbon::now();
            $start = Carbon::createFromFormat('Y-m-d',$workProgress->date_of_commencement_of_works);
            $end = Carbon::createFromFormat('Y-m-d',$workProgress->revised_date_of_contract_completion ?? $workProgress->date_of_contract_completion);
            $mothsElapsed = $now > $end ? $end->diffInMonths($start) : $now->diffInMonths($start);
            $allMonths = $end->diffInMonths($start);
            $percentageMonthsElapsed = $mothsElapsed / $allMonths * 100;

            Log::info('progress', [$workProgress->actual_physical_progress]);

            return [
                'packageProgress' => $workProgress->package,
                'contractor' => $workProgress->contractor,
                'commencementDate' => $workProgress->date_of_commencement_of_works,
                'scheduledCompletionDate' => $workProgress->date_of_contract_completion,
                'actualPhysicalProgress' => $workProgress->actual_physical_progress,
                'plannedPhysicalProgress' => $workProgress->planned_physical_progress,
                'financialProgress' => $workProgress->actual_financial_progress,
                'monthsElapsed' => $mothsElapsed,
                'timeElapsed' => $percentageMonthsElapsed
            ];
        });

        $templateProcessor->cloneRowAndSetValues('packageProgress', $worksProgress->all());



        // save the report
        $templateProcessor->saveAs(storage_path('monthly_report.docx'));
    }
}

