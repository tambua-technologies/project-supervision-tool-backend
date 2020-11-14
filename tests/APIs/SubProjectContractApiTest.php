<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProjectContract;

class SubProjectContractApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_project_contracts', $subProjectContract
        );

        $this->assertApiResponse($subProjectContract);
    }

    /**
     * @test
     */
    public function test_read_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_project_contracts/'.$subProjectContract->id
        );

        $this->assertApiResponse($subProjectContract->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();
        $editedSubProjectContract = factory(SubProjectContract::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_project_contracts/'.$subProjectContract->id,
            $editedSubProjectContract
        );

        $this->assertApiResponse($editedSubProjectContract);
    }

    /**
     * @test
     */
    public function test_delete_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_project_contracts/'.$subProjectContract->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_project_contracts/'.$subProjectContract->id
        );

        $this->response->assertStatus(404);
    }
}
