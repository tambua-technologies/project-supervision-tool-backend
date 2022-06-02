<?php

namespace App\Repositories;

use App\Exports\ExportReport;
use App\Models\ProcuringEntityReport;
use App\Models\Webhook;

/**
 * Class UserRepository
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

    public function create($input)
    {
        $webhook = parent::create($input);
        $payload = json_decode(json_encode($webhook->payload), true);

        $report = ProcuringEntityReport::create([
            'report_title' => $payload['executive_summary_section/report_title'],
            'summary' => $payload['executive_summary_section/executive_summary'],
            'report_number' => $payload['executive_summary_section/report_number'],
            'start' => $payload['executive_summary_section/start_date'],
            'end' => $payload['executive_summary_section/end_date'],
            'procuring_entity_id' => 1
        ]);


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
