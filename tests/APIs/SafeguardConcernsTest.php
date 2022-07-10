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
     * Get uploadable file.
     *
     * @return UploadedFile
     */
    protected function getUploadableFile($file): UploadedFile
    {
        $dummy = file_get_contents($file);

        file_put_contents(base_path("tests/" . basename($file)), $dummy);

        $path = base_path("tests/" . basename($file));
        $original_name = 'subscribers.csv';
        $mime_type = 'text/csv';
        $size = 111;
        $error = null;
        $test = true;

        $file = new UploadedFile($path, $original_name, $mime_type, $size, $error, $test);

        return $file;
    }


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
        var_dump($this->response);

        $this->response->assertOk();
    }


}
