<?php namespace Tests\Repositories;

use App\Models\ContractTime;
use App\Repositories\ContractTimeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContractTimeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContractTimeRepository
     */
    protected $contractTimeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contractTimeRepo = \App::make(ContractTimeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contract_time()
    {
        $contractTime = factory(ContractTime::class)->make()->toArray();

        $createdContractTime = $this->contractTimeRepo->create($contractTime);

        $createdContractTime = $createdContractTime->toArray();
        $this->assertArrayHasKey('id', $createdContractTime);
        $this->assertNotNull($createdContractTime['id'], 'Created ContractTime must have id specified');
        $this->assertNotNull(ContractTime::find($createdContractTime['id']), 'ContractTime with given id must be in DB');
        $this->assertModelData($contractTime, $createdContractTime);
    }

    /**
     * @test read
     */
    public function test_read_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();

        $dbContractTime = $this->contractTimeRepo->find($contractTime->id);

        $dbContractTime = $dbContractTime->toArray();
        $this->assertModelData($contractTime->toArray(), $dbContractTime);
    }

    /**
     * @test update
     */
    public function test_update_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();
        $fakeContractTime = factory(ContractTime::class)->make()->toArray();

        $updatedContractTime = $this->contractTimeRepo->update($fakeContractTime, $contractTime->id);

        $this->assertModelData($fakeContractTime, $updatedContractTime->toArray());
        $dbContractTime = $this->contractTimeRepo->find($contractTime->id);
        $this->assertModelData($fakeContractTime, $dbContractTime->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();

        $resp = $this->contractTimeRepo->delete($contractTime->id);

        $this->assertTrue($resp);
        $this->assertNull(ContractTime::find($contractTime->id), 'ContractTime should not exist in DB');
    }
}
