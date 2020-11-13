<?php namespace Tests\Repositories;

use App\Models\SubProjectItems;
use App\Repositories\SubProjectItemsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectItemsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectItemsRepository
     */
    protected $subProjectItemsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectItemsRepo = \App::make(SubProjectItemsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->make()->toArray();

        $createdSubProjectItems = $this->subProjectItemsRepo->create($subProjectItems);

        $createdSubProjectItems = $createdSubProjectItems->toArray();
        $this->assertArrayHasKey('id', $createdSubProjectItems);
        $this->assertNotNull($createdSubProjectItems['id'], 'Created SubProjectItems must have id specified');
        $this->assertNotNull(SubProjectItems::find($createdSubProjectItems['id']), 'SubProjectItems with given id must be in DB');
        $this->assertModelData($subProjectItems, $createdSubProjectItems);
    }

    /**
     * @test read
     */
    public function test_read_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();

        $dbSubProjectItems = $this->subProjectItemsRepo->find($subProjectItems->id);

        $dbSubProjectItems = $dbSubProjectItems->toArray();
        $this->assertModelData($subProjectItems->toArray(), $dbSubProjectItems);
    }

    /**
     * @test update
     */
    public function test_update_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();
        $fakeSubProjectItems = factory(SubProjectItems::class)->make()->toArray();

        $updatedSubProjectItems = $this->subProjectItemsRepo->update($fakeSubProjectItems, $subProjectItems->id);

        $this->assertModelData($fakeSubProjectItems, $updatedSubProjectItems->toArray());
        $dbSubProjectItems = $this->subProjectItemsRepo->find($subProjectItems->id);
        $this->assertModelData($fakeSubProjectItems, $dbSubProjectItems->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project_items()
    {
        $subProjectItems = factory(SubProjectItems::class)->create();

        $resp = $this->subProjectItemsRepo->delete($subProjectItems->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProjectItems::find($subProjectItems->id), 'SubProjectItems should not exist in DB');
    }
}
