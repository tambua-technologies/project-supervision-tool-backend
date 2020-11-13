<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProjectMilestones;

class SubProjectMilestonesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_project_milestones', $subProjectMilestones
        );

        $this->assertApiResponse($subProjectMilestones);
    }

    /**
     * @test
     */
    public function test_read_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_project_milestones/'.$subProjectMilestones->id
        );

        $this->assertApiResponse($subProjectMilestones->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();
        $editedSubProjectMilestones = factory(SubProjectMilestones::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_project_milestones/'.$subProjectMilestones->id,
            $editedSubProjectMilestones
        );

        $this->assertApiResponse($editedSubProjectMilestones);
    }

    /**
     * @test
     */
    public function test_delete_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_project_milestones/'.$subProjectMilestones->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_project_milestones/'.$subProjectMilestones->id
        );

        $this->response->assertStatus(404);
    }
}
