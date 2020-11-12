<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProjectDetail;

class SubProjectDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_project_details', $subProjectDetail
        );

        $this->assertApiResponse($subProjectDetail);
    }

    /**
     * @test
     */
    public function test_read_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_project_details/'.$subProjectDetail->id
        );

        $this->assertApiResponse($subProjectDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();
        $editedSubProjectDetail = factory(SubProjectDetail::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_project_details/'.$subProjectDetail->id,
            $editedSubProjectDetail
        );

        $this->assertApiResponse($editedSubProjectDetail);
    }

    /**
     * @test
     */
    public function test_delete_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_project_details/'.$subProjectDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_project_details/'.$subProjectDetail->id
        );

        $this->response->assertStatus(404);
    }
}
