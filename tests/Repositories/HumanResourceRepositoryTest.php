<?php namespace Tests\Repositories;

use App\Models\HumanResource;
use App\Repositories\HumanResourceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HumanResourceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HumanResourceRepository
     */
    protected $humanResourceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->humanResourceRepo = \App::make(HumanResourceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_human_resource()
    {
        $humanResource = factory(HumanResource::class)->make()->toArray();

        $createdHumanResource = $this->humanResourceRepo->create($humanResource);

        $createdHumanResource = $createdHumanResource->toArray();
        $this->assertArrayHasKey('id', $createdHumanResource);
        $this->assertNotNull($createdHumanResource['id'], 'Created HumanResource must have id specified');
        $this->assertNotNull(HumanResource::find($createdHumanResource['id']), 'HumanResource with given id must be in DB');
        $this->assertModelData($humanResource, $createdHumanResource);
    }

    /**
     * @test read
     */
    public function test_read_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();

        $dbHumanResource = $this->humanResourceRepo->find($humanResource->id);

        $dbHumanResource = $dbHumanResource->toArray();
        $this->assertModelData($humanResource->toArray(), $dbHumanResource);
    }

    /**
     * @test update
     */
    public function test_update_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();
        $fakeHumanResource = factory(HumanResource::class)->make()->toArray();

        $updatedHumanResource = $this->humanResourceRepo->update($fakeHumanResource, $humanResource->id);

        $this->assertModelData($fakeHumanResource, $updatedHumanResource->toArray());
        $dbHumanResource = $this->humanResourceRepo->find($humanResource->id);
        $this->assertModelData($fakeHumanResource, $dbHumanResource->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_human_resource()
    {
        $humanResource = factory(HumanResource::class)->create();

        $resp = $this->humanResourceRepo->delete($humanResource->id);

        $this->assertTrue($resp);
        $this->assertNull(HumanResource::find($humanResource->id), 'HumanResource should not exist in DB');
    }
}
