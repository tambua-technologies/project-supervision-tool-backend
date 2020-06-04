<?php namespace Tests\Repositories;

use App\Models\StockGroupCluster;
use App\Repositories\StockGroupClusterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockGroupClusterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockGroupClusterRepository
     */
    protected $stockGroupClusterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockGroupClusterRepo = \App::make(StockGroupClusterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->make()->toArray();

        $createdStockGroupCluster = $this->stockGroupClusterRepo->create($stockGroupCluster);

        $createdStockGroupCluster = $createdStockGroupCluster->toArray();
        $this->assertArrayHasKey('id', $createdStockGroupCluster);
        $this->assertNotNull($createdStockGroupCluster['id'], 'Created StockGroupCluster must have id specified');
        $this->assertNotNull(StockGroupCluster::find($createdStockGroupCluster['id']), 'StockGroupCluster with given id must be in DB');
        $this->assertModelData($stockGroupCluster, $createdStockGroupCluster);
    }

    /**
     * @test read
     */
    public function test_read_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();

        $dbStockGroupCluster = $this->stockGroupClusterRepo->find($stockGroupCluster->id);

        $dbStockGroupCluster = $dbStockGroupCluster->toArray();
        $this->assertModelData($stockGroupCluster->toArray(), $dbStockGroupCluster);
    }

    /**
     * @test update
     */
    public function test_update_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();
        $fakeStockGroupCluster = factory(StockGroupCluster::class)->make()->toArray();

        $updatedStockGroupCluster = $this->stockGroupClusterRepo->update($fakeStockGroupCluster, $stockGroupCluster->id);

        $this->assertModelData($fakeStockGroupCluster, $updatedStockGroupCluster->toArray());
        $dbStockGroupCluster = $this->stockGroupClusterRepo->find($stockGroupCluster->id);
        $this->assertModelData($fakeStockGroupCluster, $dbStockGroupCluster->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();

        $resp = $this->stockGroupClusterRepo->delete($stockGroupCluster->id);

        $this->assertTrue($resp);
        $this->assertNull(StockGroupCluster::find($stockGroupCluster->id), 'StockGroupCluster should not exist in DB');
    }
}
