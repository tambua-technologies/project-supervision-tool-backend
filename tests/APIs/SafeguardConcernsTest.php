<?php namespace Tests\APIs;


use App\Models\SafeguardConcern;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Illuminate\Http\UploadedFile;

class SafeguardConcernsTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;





    /**
     * @test
     */
    public function test_upload_safeguardConcerns()
    {
        $this->response = $this->json(
            'POST',
            '/api/v1/safeguard_concerns/import', [
                'file' => new UploadedFile(base_path('tests/fixtures/safeguard_concerns_test_data.xlsx'), 'safeguard_concerns_test_data.xlsx', null, null, true),
            ]
        );

        $this->response->assertOk();
    }

    public function test_get_safeguard_concerns() {
        $this->response = $this->json('GET', '/api/v1/safeguard_concerns');
        $response = json_decode($this->response->getContent(), true);
        $safeguardConcerns = $response['data']['data'];

        $expectedKeys = [
            'id',
            'procuring_entity_id',
            'sub_project',
            'concern_type',
            'issue',
            'description',
            'commitment',
            'steps_taken',
            'challenges',
            'mitigation_measures',
            'way_forward',
            'created_at',
            'updated_at',
            'package',

        ];
        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $safeguardConcerns[0]);
        }

        $this->assertEquals(3, $response['data']['total']);

    }
}
