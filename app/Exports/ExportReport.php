<?php

namespace App\Exports;

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityContract;
use App\Models\ProcuringEntityReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportReport
{


    public static function getMoney($moneyObject): string
    {
        if (!$moneyObject) return 'N/A';

        $m = json_decode($moneyObject);
        return $m->amount . ' ' . $m->currency;
    }

    /**
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public static function create($procuringEntityId, $reportId)
    {
        Settings::setOutputEscapingEnabled(true);

        $templateProcessor = new TemplateProcessor(resource_path('csc_monthly_monitoring_reports_template.docx'));

        Log::info('reportid', [$reportId]);
        // get report & procuring entity
        $report = ProcuringEntityReport::find($reportId);

        Log::info('report', [$report]);

        $procuringEntity = ProcuringEntity::find($procuringEntityId);
        $contract = $procuringEntity->contract()->first();
        $project = $procuringEntity->project()->first();
        $revised_contract_sum = $contract->revised_contract_sum->amount . ' ' . $contract->revised_contract_sum->currency;
        $original_contract_sum = $contract->original_contract_sum->amount . ' ' . $contract->original_contract_sum->currency;


        // fill report title
        $reportTitle = $report->report_title;
        $templateProcessor->setValue('reportTitle', $reportTitle);

        // fill the Executive section
        $executiveSummary = $report->summary;
        $templateProcessor->setValue('reportNumber', $report->report_number);
        $templateProcessor->setValue('reportStartDate', $report->start);
        $templateProcessor->setValue('reportEndDate', $report->end);
        $templateProcessor->setValue('executiveSummary', $executiveSummary);



        // fill contract information
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
where p.procuring_entity_id = $procuringEntityId";


        $worksSummary = collect(DB::select($worksSummaryQuery));

        $works = $worksSummary->map(function ($work) {
            $contractCost = self::getMoney($work->contractcost);
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
                 pe_contracts.name contract_name,
                 pe_contracts.contract_no,
                 pe_contracts.original_contract_sum,
                 pe_contracts.revised_contract_sum,
                 pep.procuring_entity_id,
                 c.name contractor,
                 c.address contractor_address,
                 pe_contracts.date_of_commencement_of_works,
                 pe_contracts.date_of_contract_completion,
                 pe_contracts.revised_date_of_contract_completion,
                 pe_contracts.date_contract_agreement_signed,
                 pe_contracts.date_possession_of_site_given,
                 pe_contracts.date_of_end_of_mobilization_period,
                 pe_contracts.defects_liability_notification_period,
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
           where procuring_entity_id = $procuringEntityId";

        $constructionProgressSummary = collect(DB::select($constructionProgressSummaryQuery));

        $worksProgress = $constructionProgressSummary->map(function ($workProgress) {

            // time elapsed
            $now = Carbon::now();
            $start = Carbon::createFromFormat('Y-m-d',$workProgress->date_of_commencement_of_works);
            $end = Carbon::createFromFormat('Y-m-d',$workProgress->revised_date_of_contract_completion ?? $workProgress->date_of_contract_completion);
            $mothsElapsed = $now > $end ? $end->diffInMonths($start) : $now->diffInMonths($start);
            $allMonths = $end->diffInMonths($start);
            $percentageMonthsElapsed = $mothsElapsed / $allMonths * 100;

            return [
                'packageProgress' => $workProgress->package,
                'contractor' => $workProgress->contractor,
                'commencementDate' => $workProgress->date_of_commencement_of_works,
                'scheduledCompletionDate' => $workProgress->date_of_contract_completion,
                'actualPhysicalProgress' => $workProgress->actual_physical_progress,
                'plannedPhysicalProgress' => $workProgress->planned_physical_progress,
                'financialProgress' => $workProgress->actual_financial_progress,
                'monthsElapsed' => $mothsElapsed,
                'timeElapsed' => $percentageMonthsElapsed,
                'packageContractName' => $workProgress->contract_name
            ];
        });

        $templateProcessor->cloneRowAndSetValues('packageProgress', $worksProgress->all());


        // fill packages section
        $packages = $constructionProgressSummary->map(function ($w) use($procuringEntity) {
            $packageOriginalContractSum = self::getMoney($w->original_contract_sum);
            $packageRevisedContractSum = self::getMoney($w->revised_contract_sum);
            return [
                'packageContractName' => htmlspecialchars($w->contract_name),
                'packageContractNumber' => $w->contract_no,
                'packageContractor' => htmlspecialchars($w->contractor),
                'packageContractorContact' => htmlspecialchars($w->contractor_address),
                'packageProcuringEntity' => $procuringEntity->agency()->first()->name,
                'packageOriginalContractSum' => $packageOriginalContractSum,
                'packageRevisedContractSum' => $packageRevisedContractSum,
                'packageContractAgreementSigningDate' => $w->date_contract_agreement_signed,
                'packageSitePossessionDate' => $w->date_possession_of_site_given,
                'packageWorksCommencementDate' => $w->date_of_commencement_of_works,
                'packageMobilizationPeriodEndDate' => $w->date_of_end_of_mobilization_period,
                'packageContractEndDate' => $w->date_of_contract_completion,
                'packageContractRevisedEndDate' => $w->revised_date_of_contract_completion,
                'packageDefectsLiabilityNotificationPeriod' => $w->defects_liability_notification_period,
                'packageName' => htmlspecialchars($w->package),
            ];
        });


        $templateProcessor->cloneBlock('clonePackage', 0, true, false, $packages->all());


        $fileName = strtolower($procuringEntity->agency()->first()->name) . '_monthly_report_number_' . $report->report_number . '.docx';

        // save the report
        $templateProcessor->saveAs(storage_path($fileName));


    }
}

