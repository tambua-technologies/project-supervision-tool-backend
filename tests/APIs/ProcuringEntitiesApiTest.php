<?php namespace Tests\APIs;


use App\Models\SafeguardConcern;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Illuminate\Http\UploadedFile;

class ProcuringEntitiesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;




    public function test_get_package_statistics() {
        $this->response = $this->json('GET', '/api/v1/procuring_entities/1/packages/statistics');
        $response = json_decode($this->response->getContent(), true);
        $packageStatistics = $response['data'];



        $this->assertEquals(0, $packageStatistics['in_progress']);
        $this->assertEquals(0, $packageStatistics['completed']);
        $this->assertEquals(8, $packageStatistics['challenges']);
        $this->assertEquals(null, $packageStatistics['latestReport']);

    }
}
