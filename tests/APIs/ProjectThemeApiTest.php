<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProjectTheme;

class ProjectThemeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/project_themes', $projectTheme
        );

        $this->assertApiResponse($projectTheme);
    }

    /**
     * @test
     */
    public function test_read_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/project_themes/'.$projectTheme->id
        );

        $this->assertApiResponse($projectTheme->toArray());
    }

    /**
     * @test
     */
    public function test_update_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();
        $editedProjectTheme = factory(ProjectTheme::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/project_themes/'.$projectTheme->id,
            $editedProjectTheme
        );

        $this->assertApiResponse($editedProjectTheme);
    }

    /**
     * @test
     */
    public function test_delete_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/project_themes/'.$projectTheme->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/project_themes/'.$projectTheme->id
        );

        $this->response->assertStatus(404);
    }
}
