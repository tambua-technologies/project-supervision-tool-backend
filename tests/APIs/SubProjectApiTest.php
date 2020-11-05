<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProject;

class SubProjectApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project()
    {
        $subProject = factory(SubProject::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_projects', $subProject
        );

        $this->assertApiResponse($subProject);
    }

    /**
     * @test
     */
    public function test_read_sub_project()
    {
        $subProject = factory(SubProject::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_projects/'.$subProject->id
        );

        $this->assertApiResponse($subProject->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project()
    {
        $subProject = factory(SubProject::class)->create();
        $editedSubProject = factory(SubProject::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_projects/'.$subProject->id,
            $editedSubProject
        );

        $this->assertApiResponse($editedSubProject);
    }

    /**
     * @test
     */
    public function test_delete_sub_project()
    {
        $subProject = factory(SubProject::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_projects/'.$subProject->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_projects/'.$subProject->id
        );

        $this->response->assertStatus(404);
    }
}
