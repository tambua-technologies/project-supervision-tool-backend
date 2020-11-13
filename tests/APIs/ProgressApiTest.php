<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Progress;

class ProgressApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_progress()
    {
        $progress = factory(Progress::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/progress', $progress
        );

        $this->assertApiResponse($progress);
    }

    /**
     * @test
     */
    public function test_read_progress()
    {
        $progress = factory(Progress::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/progress/'.$progress->id
        );

        $this->assertApiResponse($progress->toArray());
    }

    /**
     * @test
     */
    public function test_update_progress()
    {
        $progress = factory(Progress::class)->create();
        $editedProgress = factory(Progress::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/progress/'.$progress->id,
            $editedProgress
        );

        $this->assertApiResponse($editedProgress);
    }

    /**
     * @test
     */
    public function test_delete_progress()
    {
        $progress = factory(Progress::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/progress/'.$progress->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/progress/'.$progress->id
        );

        $this->response->assertStatus(404);
    }
}
