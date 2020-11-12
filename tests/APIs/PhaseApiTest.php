<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Phase;

class PhaseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_phase()
    {
        $phase = factory(Phase::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/phases', $phase
        );

        $this->assertApiResponse($phase);
    }

    /**
     * @test
     */
    public function test_read_phase()
    {
        $phase = factory(Phase::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/phases/'.$phase->id
        );

        $this->assertApiResponse($phase->toArray());
    }

    /**
     * @test
     */
    public function test_update_phase()
    {
        $phase = factory(Phase::class)->create();
        $editedPhase = factory(Phase::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/phases/'.$phase->id,
            $editedPhase
        );

        $this->assertApiResponse($editedPhase);
    }

    /**
     * @test
     */
    public function test_delete_phase()
    {
        $phase = factory(Phase::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/phases/'.$phase->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/phases/'.$phase->id
        );

        $this->response->assertStatus(404);
    }
}
