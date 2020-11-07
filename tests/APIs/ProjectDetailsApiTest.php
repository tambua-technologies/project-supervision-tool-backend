<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProjectDetails;

class ProjectDetailsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/project_details', $projectDetails
        );

        $this->assertApiResponse($projectDetails);
    }

    /**
     * @test
     */
    public function test_read_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/project_details/'.$projectDetails->id
        );

        $this->assertApiResponse($projectDetails->toArray());
    }

    /**
     * @test
     */
    public function test_update_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();
        $editedProjectDetails = factory(ProjectDetails::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/project_details/'.$projectDetails->id,
            $editedProjectDetails
        );

        $this->assertApiResponse($editedProjectDetails);
    }

    /**
     * @test
     */
    public function test_delete_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/project_details/'.$projectDetails->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/project_details/'.$projectDetails->id
        );

        $this->response->assertStatus(404);
    }
}
