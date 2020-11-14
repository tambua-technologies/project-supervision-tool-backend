<?php namespace Tests\Repositories;

use App\Models\ContractCost;
use App\Repositories\ContractCostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContractCostRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContractCostRepository
     */
    protected $contractCostRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contractCostRepo = \App::make(ContractCostRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->make()->toArray();

        $createdContractCost = $this->contractCostRepo->create($contractCost);

        $createdContractCost = $createdContractCost->toArray();
        $this->assertArrayHasKey('id', $createdContractCost);
        $this->assertNotNull($createdContractCost['id'], 'Created ContractCost must have id specified');
        $this->assertNotNull(ContractCost::find($createdContractCost['id']), 'ContractCost with given id must be in DB');
        $this->assertModelData($contractCost, $createdContractCost);
    }

    /**
     * @test read
     */
    public function test_read_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();

        $dbContractCost = $this->contractCostRepo->find($contractCost->id);

        $dbContractCost = $dbContractCost->toArray();
        $this->assertModelData($contractCost->toArray(), $dbContractCost);
    }

    /**
     * @test update
     */
    public function test_update_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();
        $fakeContractCost = factory(ContractCost::class)->make()->toArray();

        $updatedContractCost = $this->contractCostRepo->update($fakeContractCost, $contractCost->id);

        $this->assertModelData($fakeContractCost, $updatedContractCost->toArray());
        $dbContractCost = $this->contractCostRepo->find($contractCost->id);
        $this->assertModelData($fakeContractCost, $dbContractCost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();

        $resp = $this->contractCostRepo->delete($contractCost->id);

        $this->assertTrue($resp);
        $this->assertNull(ContractCost::find($contractCost->id), 'ContractCost should not exist in DB');
    }
}
