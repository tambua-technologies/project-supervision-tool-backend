<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\InitiativeType;

class InitiativeTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/initiative_types', $initiativeType
        );

        $this->assertApiResponse($initiativeType);
    }

    /**
     * @test
     */
    public function test_read_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/initiative_types/'.$initiativeType->id
        );

        $this->assertApiResponse($initiativeType->toArray());
    }

    /**
     * @test
     */
    public function test_update_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();
        $editedInitiativeType = factory(InitiativeType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/initiative_types/'.$initiativeType->id,
            $editedInitiativeType
        );

        $this->assertApiResponse($editedInitiativeType);
    }

    /**
     * @test
     */
    public function test_delete_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/initiative_types/'.$initiativeType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/initiative_types/'.$initiativeType->id
        );

        $this->response->assertStatus(404);
    }
}
