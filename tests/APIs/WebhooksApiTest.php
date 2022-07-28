<?php namespace Tests\APIs;


use App\Models\ProcuringEntityReport;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\File;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WebhooksApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;




    public function test_consume_webhook() {
        $json = json_decode(File::get(base_path('tests/fixtures/webhook.json')));

        $this->response = $this->json('post', '/api/v1/webhooks/reports', ['report' => $json]);
        $this->response->assertOk();

    }
}
