<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProjectSectors;

class ProjectSectorsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/project_sectors', $projectSectors
        );

        $this->assertApiResponse($projectSectors);
    }

    /**
     * @test
     */
    public function test_read_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/project_sectors/'.$projectSectors->id
        );

        $this->assertApiResponse($projectSectors->toArray());
    }

    /**
     * @test
     */
    public function test_update_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();
        $editedProjectSectors = factory(ProjectSectors::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/project_sectors/'.$projectSectors->id,
            $editedProjectSectors
        );

        $this->assertApiResponse($editedProjectSectors);
    }

    /**
     * @test
     */
    public function test_delete_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/project_sectors/'.$projectSectors->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/project_sectors/'.$projectSectors->id
        );

        $this->response->assertStatus(404);
    }
}
