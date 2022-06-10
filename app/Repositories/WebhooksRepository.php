<?php

namespace App\Repositories;

use App\Exports\ExportReport;
use App\Models\PackageContractProgress;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use App\Models\ProcuringEntityReport;
use App\Models\Webhook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Class WebhooksRepository
 * @package App\Repositories
 * @version November 12, 2020, 6:57 am UTC
 */

class WebhooksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'payload'
    ];


    private function createReport($procuringEntityId, $payload) {
        return ProcuringEntityReport::create([
            'report_title' => $payload['executive_summary_section/report_title'],
            'summary' => $payload['executive_summary_section/executive_summary'],
            'report_number' => $payload['executive_summary_section/report_number'],
            'start' => $payload['executive_summary_section/start_date'],
            'end' => $payload['executive_summary_section/end_date'],
            'procuring_entity_id' => $procuringEntityId
        ]);
    }

    private function recordProgress($payload)
    {
        // create package progress
        $progressArr = $payload['progress'];
        foreach ($progressArr as $progress) {

            $packageName = Str::of($progress['progress/package'])->replace('_', ' ')->__toString();
            $package = ProcuringEntityPackage::where('name','ilike' , "%{$packageName}%")->first();

            if ($package) {
                $contract = $package->contract()->first();
                PackageContractProgress::create([
                    'package_contract_id' => $contract->id,
                    'actual_physical_progress' => $progress['progress/actual_physical_progress'],
                    'planned_physical_progress' => $progress['progress/planned_physical_progress'],
                    'actual_financial_progress' => $progress['progress/financial_progress'],
                    'progress_date' => $payload['executive_summary_section/end_date']
                ]);
            }

        }
    }

    public function create($input): Model
    {
        $webhook = parent::create($input);
        $procuringEntityId = 1;
        $payload = json_decode(json_encode($webhook->payload), true);

        $report = $this->createReport($procuringEntityId, $payload);
        $this->recordProgress($payload);

        ExportReport::create(1, $report->id);
        return $webhook;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Webhook::class;
    }
}
