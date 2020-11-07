<?php namespace Tests\Repositories;

use App\Models\ProjectDetails;
use App\Repositories\ProjectDetailsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProjectDetailsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectDetailsRepository
     */
    protected $projectDetailsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->projectDetailsRepo = \App::make(ProjectDetailsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->make()->toArray();

        $createdProjectDetails = $this->projectDetailsRepo->create($projectDetails);

        $createdProjectDetails = $createdProjectDetails->toArray();
        $this->assertArrayHasKey('id', $createdProjectDetails);
        $this->assertNotNull($createdProjectDetails['id'], 'Created ProjectDetails must have id specified');
        $this->assertNotNull(ProjectDetails::find($createdProjectDetails['id']), 'ProjectDetails with given id must be in DB');
        $this->assertModelData($projectDetails, $createdProjectDetails);
    }

    /**
     * @test read
     */
    public function test_read_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();

        $dbProjectDetails = $this->projectDetailsRepo->find($projectDetails->id);

        $dbProjectDetails = $dbProjectDetails->toArray();
        $this->assertModelData($projectDetails->toArray(), $dbProjectDetails);
    }

    /**
     * @test update
     */
    public function test_update_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();
        $fakeProjectDetails = factory(ProjectDetails::class)->make()->toArray();

        $updatedProjectDetails = $this->projectDetailsRepo->update($fakeProjectDetails, $projectDetails->id);

        $this->assertModelData($fakeProjectDetails, $updatedProjectDetails->toArray());
        $dbProjectDetails = $this->projectDetailsRepo->find($projectDetails->id);
        $this->assertModelData($fakeProjectDetails, $dbProjectDetails->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_project_details()
    {
        $projectDetails = factory(ProjectDetails::class)->create();

        $resp = $this->projectDetailsRepo->delete($projectDetails->id);

        $this->assertTrue($resp);
        $this->assertNull(ProjectDetails::find($projectDetails->id), 'ProjectDetails should not exist in DB');
    }
}
