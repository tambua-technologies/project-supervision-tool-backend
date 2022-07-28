<?php namespace Tests\APIs;


use App\Models\ProcuringEntityReport;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProcuringEntityReportsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;




    public function test_get_reports_by_procuring_entity_id() {
        ProcuringEntityReport::create([
            'report_title' => 'test report',
            'summary' => 'test report',
            'report_number' => 1,
            'start' => '2022-05-01',
            'end' => '2022-05-31',
            'procuring_entity_id' => 1
        ]);

        $this->response = $this->json('GET',
            'api/v1/procuring_entity_reports?filter[procuring_entity_id]=1',
        );

        $response = json_decode($this->response->getContent(), true);
        $expectedNumberOfReports = ProcuringEntityReport::where('procuring_entity_id', 1)->count();
        $actualNumberOfReports = collect($response['data'])->count();
        self::assertEquals($expectedNumberOfReports,$actualNumberOfReports);
    }
}
