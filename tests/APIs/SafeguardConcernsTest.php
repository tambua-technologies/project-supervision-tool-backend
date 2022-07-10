<?php namespace Tests\APIs;


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
        $this->json(
            'POST',
            '/api/v1/procuring_entity_packages/import',
            [
                'file' => new UploadedFile(base_path('tests/fixtures/packages_and_contracts_testing_data.xlsx'), 'packages_and_contracts_testing_data.xlsx', null, null, true),
            ]
        );

        $this->response = $this->json(
            'POST',
            '/api/v1/safeguard_concerns/import', [
                'file' => new UploadedFile(base_path('tests/fixtures/safeguard_concerns_test_data.xlsx'), 'safeguard_concerns_test_data.xlsx', null, null, true),
            ]
        );
        //var_dump($this->response);

        $this->response->assertOk();
    }


}
