<?php namespace Tests\Repositories;

use App\Models\SubProjectMilestones;
use App\Repositories\SubProjectMilestonesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectMilestonesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectMilestonesRepository
     */
    protected $subProjectMilestonesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectMilestonesRepo = \App::make(SubProjectMilestonesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->make()->toArray();

        $createdSubProjectMilestones = $this->subProjectMilestonesRepo->create($subProjectMilestones);

        $createdSubProjectMilestones = $createdSubProjectMilestones->toArray();
        $this->assertArrayHasKey('id', $createdSubProjectMilestones);
        $this->assertNotNull($createdSubProjectMilestones['id'], 'Created SubProjectMilestones must have id specified');
        $this->assertNotNull(SubProjectMilestones::find($createdSubProjectMilestones['id']), 'SubProjectMilestones with given id must be in DB');
        $this->assertModelData($subProjectMilestones, $createdSubProjectMilestones);
    }

    /**
     * @test read
     */
    public function test_read_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();

        $dbSubProjectMilestones = $this->subProjectMilestonesRepo->find($subProjectMilestones->id);

        $dbSubProjectMilestones = $dbSubProjectMilestones->toArray();
        $this->assertModelData($subProjectMilestones->toArray(), $dbSubProjectMilestones);
    }

    /**
     * @test update
     */
    public function test_update_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();
        $fakeSubProjectMilestones = factory(SubProjectMilestones::class)->make()->toArray();

        $updatedSubProjectMilestones = $this->subProjectMilestonesRepo->update($fakeSubProjectMilestones, $subProjectMilestones->id);

        $this->assertModelData($fakeSubProjectMilestones, $updatedSubProjectMilestones->toArray());
        $dbSubProjectMilestones = $this->subProjectMilestonesRepo->find($subProjectMilestones->id);
        $this->assertModelData($fakeSubProjectMilestones, $dbSubProjectMilestones->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project_milestones()
    {
        $subProjectMilestones = factory(SubProjectMilestones::class)->create();

        $resp = $this->subProjectMilestonesRepo->delete($subProjectMilestones->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProjectMilestones::find($subProjectMilestones->id), 'SubProjectMilestones should not exist in DB');
    }
}
