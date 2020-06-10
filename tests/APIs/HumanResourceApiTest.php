<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\HumanResource;

class HumanResourceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_human_resource()
    {
        $humanResource = factory(HumanResource::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/human_resources', $humanResource
        );

        $this->assertApiResponse($humanResource);
    }

    /**
     * @test
     */
    public function test_read_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/human_resources/'.$humanResource->id
        );

        $this->assertApiResponse($humanResource->toArray());
    }

    /**
     * @test
     */
    public function test_update_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();
        $editedHumanResource = factory(HumanResource::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/human_resources/'.$humanResource->id,
            $editedHumanResource
        );

        $this->assertApiResponse($editedHumanResource);
    }

    /**
     * @test
     */
    public function test_delete_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/human_resources/'.$humanResource->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/human_resources/'.$humanResource->id
        );

        $this->response->assertStatus(404);
    }
}
