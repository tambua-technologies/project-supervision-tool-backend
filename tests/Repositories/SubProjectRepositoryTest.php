<?php namespace Tests\Repositories;

use App\Models\SubProject;
use App\Repositories\SubProjectRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectRepository
     */
    protected $subProjectRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectRepo = \App::make(SubProjectRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project()
    {
        $subProject = factory(SubProject::class)->make()->toArray();

        $createdSubProject = $this->subProjectRepo->create($subProject);

        $createdSubProject = $createdSubProject->toArray();
        $this->assertArrayHasKey('id', $createdSubProject);
        $this->assertNotNull($createdSubProject['id'], 'Created SubProject must have id specified');
        $this->assertNotNull(SubProject::find($createdSubProject['id']), 'SubProject with given id must be in DB');
        $this->assertModelData($subProject, $createdSubProject);
    }

    /**
     * @test read
     */
    public function test_read_sub_project()
    {
        $subProject = factory(SubProject::class)->create();

        $dbSubProject = $this->subProjectRepo->find($subProject->id);

        $dbSubProject = $dbSubProject->toArray();
        $this->assertModelData($subProject->toArray(), $dbSubProject);
    }

    /**
     * @test update
     */
    public function test_update_sub_project()
    {
        $subProject = factory(SubProject::class)->create();
        $fakeSubProject = factory(SubProject::class)->make()->toArray();

        $updatedSubProject = $this->subProjectRepo->update($fakeSubProject, $subProject->id);

        $this->assertModelData($fakeSubProject, $updatedSubProject->toArray());
        $dbSubProject = $this->subProjectRepo->find($subProject->id);
        $this->assertModelData($fakeSubProject, $dbSubProject->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project()
    {
        $subProject = factory(SubProject::class)->create();

        $resp = $this->subProjectRepo->delete($subProject->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProject::find($subProject->id), 'SubProject should not exist in DB');
    }
}
