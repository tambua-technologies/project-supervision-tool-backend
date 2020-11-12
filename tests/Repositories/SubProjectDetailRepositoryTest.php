<?php namespace Tests\Repositories;

use App\Models\SubProjectDetail;
use App\Repositories\SubProjectDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectDetailRepository
     */
    protected $subProjectDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectDetailRepo = \App::make(SubProjectDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->make()->toArray();

        $createdSubProjectDetail = $this->subProjectDetailRepo->create($subProjectDetail);

        $createdSubProjectDetail = $createdSubProjectDetail->toArray();
        $this->assertArrayHasKey('id', $createdSubProjectDetail);
        $this->assertNotNull($createdSubProjectDetail['id'], 'Created SubProjectDetail must have id specified');
        $this->assertNotNull(SubProjectDetail::find($createdSubProjectDetail['id']), 'SubProjectDetail with given id must be in DB');
        $this->assertModelData($subProjectDetail, $createdSubProjectDetail);
    }

    /**
     * @test read
     */
    public function test_read_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();

        $dbSubProjectDetail = $this->subProjectDetailRepo->find($subProjectDetail->id);

        $dbSubProjectDetail = $dbSubProjectDetail->toArray();
        $this->assertModelData($subProjectDetail->toArray(), $dbSubProjectDetail);
    }

    /**
     * @test update
     */
    public function test_update_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();
        $fakeSubProjectDetail = factory(SubProjectDetail::class)->make()->toArray();

        $updatedSubProjectDetail = $this->subProjectDetailRepo->update($fakeSubProjectDetail, $subProjectDetail->id);

        $this->assertModelData($fakeSubProjectDetail, $updatedSubProjectDetail->toArray());
        $dbSubProjectDetail = $this->subProjectDetailRepo->find($subProjectDetail->id);
        $this->assertModelData($fakeSubProjectDetail, $dbSubProjectDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project_detail()
    {
        $subProjectDetail = factory(SubProjectDetail::class)->create();

        $resp = $this->subProjectDetailRepo->delete($subProjectDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProjectDetail::find($subProjectDetail->id), 'SubProjectDetail should not exist in DB');
    }
}
