<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ActorType;

class ActorTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_actor_type()
    {
        $actorType = factory(ActorType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/actor_types', $actorType
        );

        $this->assertApiResponse($actorType);
    }

    /**
     * @test
     */
    public function test_read_actor_type()
    {
        $actorType = factory(ActorType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/actor_types/'.$actorType->id
        );

        $this->assertApiResponse($actorType->toArray());
    }

    /**
     * @test
     */
    public function test_update_actor_type()
    {
        $actorType = factory(ActorType::class)->create();
        $editedActorType = factory(ActorType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/actor_types/'.$actorType->id,
            $editedActorType
        );

        $this->assertApiResponse($editedActorType);
    }

    /**
     * @test
     */
    public function test_delete_actor_type()
    {
        $actorType = factory(ActorType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/actor_types/'.$actorType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/actor_types/'.$actorType->id
        );

        $this->response->assertStatus(404);
    }
}
