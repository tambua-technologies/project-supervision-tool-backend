<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProjectItems;

class SubProjectItemsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_project_items', $subProjectItems
        );

        $this->assertApiResponse($subProjectItems);
    }

    /**
     * @test
     */
    public function test_read_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_project_items/'.$subProjectItems->id
        );

        $this->assertApiResponse($subProjectItems->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();
        $editedSubProjectItems = factory(SubProjectItems::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_project_items/'.$subProjectItems->id,
            $editedSubProjectItems
        );

        $this->assertApiResponse($editedSubProjectItems);
    }

    /**
     * @test
     */
    public function test_delete_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_project_items/'.$subProjectItems->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_project_items/'.$subProjectItems->id
        );

        $this->response->assertStatus(404);
    }
}
