<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Initiative;

class InitiativeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_initiative()
    {
        $initiative = factory(Initiative::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/initiatives', $initiative
        );

        $this->assertApiResponse($initiative);
    }

    /**
     * @test
     */
    public function test_read_initiative()
    {
        $initiative = factory(Initiative::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/initiatives/'.$initiative->id
        );

        $this->assertApiResponse($initiative->toArray());
    }

    /**
     * @test
     */
    public function test_update_initiative()
    {
        $initiative = factory(Initiative::class)->create();
        $editedInitiative = factory(Initiative::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/initiatives/'.$initiative->id,
            $editedInitiative
        );

        $this->assertApiResponse($editedInitiative);
    }

    /**
     * @test
     */
    public function test_delete_initiative()
    {
        $initiative = factory(Initiative::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/initiatives/'.$initiative->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/initiatives/'.$initiative->id
        );

        $this->response->assertStatus(404);
    }
}
