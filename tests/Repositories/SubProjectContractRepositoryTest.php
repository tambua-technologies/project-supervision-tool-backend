<?php namespace Tests\Repositories;

use App\Models\SubProjectContract;
use App\Repositories\SubProjectContractRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectContractRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectContractRepository
     */
    protected $subProjectContractRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectContractRepo = \App::make(SubProjectContractRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->make()->toArray();

        $createdSubProjectContract = $this->subProjectContractRepo->create($subProjectContract);

        $createdSubProjectContract = $createdSubProjectContract->toArray();
        $this->assertArrayHasKey('id', $createdSubProjectContract);
        $this->assertNotNull($createdSubProjectContract['id'], 'Created SubProjectContract must have id specified');
        $this->assertNotNull(SubProjectContract::find($createdSubProjectContract['id']), 'SubProjectContract with given id must be in DB');
        $this->assertModelData($subProjectContract, $createdSubProjectContract);
    }

    /**
     * @test read
     */
    public function test_read_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();

        $dbSubProjectContract = $this->subProjectContractRepo->find($subProjectContract->id);

        $dbSubProjectContract = $dbSubProjectContract->toArray();
        $this->assertModelData($subProjectContract->toArray(), $dbSubProjectContract);
    }

    /**
     * @test update
     */
    public function test_update_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();
        $fakeSubProjectContract = factory(SubProjectContract::class)->make()->toArray();

        $updatedSubProjectContract = $this->subProjectContractRepo->update($fakeSubProjectContract, $subProjectContract->id);

        $this->assertModelData($fakeSubProjectContract, $updatedSubProjectContract->toArray());
        $dbSubProjectContract = $this->subProjectContractRepo->find($subProjectContract->id);
        $this->assertModelData($fakeSubProjectContract, $dbSubProjectContract->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project_contract()
    {
        $subProjectContract = factory(SubProjectContract::class)->create();

        $resp = $this->subProjectContractRepo->delete($subProjectContract->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProjectContract::find($subProjectContract->id), 'SubProjectContract should not exist in DB');
    }
}
