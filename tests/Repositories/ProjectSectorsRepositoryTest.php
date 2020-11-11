<?php namespace Tests\Repositories;

use App\Models\ProjectSectors;
use App\Repositories\ProjectSectorsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProjectSectorsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectSectorsRepository
     */
    protected $projectSectorsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->projectSectorsRepo = \App::make(ProjectSectorsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->make()->toArray();

        $createdProjectSectors = $this->projectSectorsRepo->create($projectSectors);

        $createdProjectSectors = $createdProjectSectors->toArray();
        $this->assertArrayHasKey('id', $createdProjectSectors);
        $this->assertNotNull($createdProjectSectors['id'], 'Created ProjectSectors must have id specified');
        $this->assertNotNull(ProjectSectors::find($createdProjectSectors['id']), 'ProjectSectors with given id must be in DB');
        $this->assertModelData($projectSectors, $createdProjectSectors);
    }

    /**
     * @test read
     */
    public function test_read_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();

        $dbProjectSectors = $this->projectSectorsRepo->find($projectSectors->id);

        $dbProjectSectors = $dbProjectSectors->toArray();
        $this->assertModelData($projectSectors->toArray(), $dbProjectSectors);
    }

    /**
     * @test update
     */
    public function test_update_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();
        $fakeProjectSectors = factory(ProjectSectors::class)->make()->toArray();

        $updatedProjectSectors = $this->projectSectorsRepo->update($fakeProjectSectors, $projectSectors->id);

        $this->assertModelData($fakeProjectSectors, $updatedProjectSectors->toArray());
        $dbProjectSectors = $this->projectSectorsRepo->find($projectSectors->id);
        $this->assertModelData($fakeProjectSectors, $dbProjectSectors->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_project_sectors()
    {
        $projectSectors = factory(ProjectSectors::class)->create();

        $resp = $this->projectSectorsRepo->delete($projectSectors->id);

        $this->assertTrue($resp);
        $this->assertNull(ProjectSectors::find($projectSectors->id), 'ProjectSectors should not exist in DB');
    }
}
