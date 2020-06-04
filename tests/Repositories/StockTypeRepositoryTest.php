<?php namespace Tests\Repositories;

use App\Models\StockType;
use App\Repositories\StockTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockTypeRepository
     */
    protected $stockTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockTypeRepo = \App::make(StockTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_type()
    {
        $stockType = factory(StockType::class)->make()->toArray();

        $createdStockType = $this->stockTypeRepo->create($stockType);

        $createdStockType = $createdStockType->toArray();
        $this->assertArrayHasKey('id', $createdStockType);
        $this->assertNotNull($createdStockType['id'], 'Created StockType must have id specified');
        $this->assertNotNull(StockType::find($createdStockType['id']), 'StockType with given id must be in DB');
        $this->assertModelData($stockType, $createdStockType);
    }

    /**
     * @test read
     */
    public function test_read_stock_type()
    {
        $stockType = factory(StockType::class)->create();

        $dbStockType = $this->stockTypeRepo->find($stockType->id);

        $dbStockType = $dbStockType->toArray();
        $this->assertModelData($stockType->toArray(), $dbStockType);
    }

    /**
     * @test update
     */
    public function test_update_stock_type()
    {
        $stockType = factory(StockType::class)->create();
        $fakeStockType = factory(StockType::class)->make()->toArray();

        $updatedStockType = $this->stockTypeRepo->update($fakeStockType, $stockType->id);

        $this->assertModelData($fakeStockType, $updatedStockType->toArray());
        $dbStockType = $this->stockTypeRepo->find($stockType->id);
        $this->assertModelData($fakeStockType, $dbStockType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_type()
    {
        $stockType = factory(StockType::class)->create();

        $resp = $this->stockTypeRepo->delete($stockType->id);

        $this->assertTrue($resp);
        $this->assertNull(StockType::find($stockType->id), 'StockType should not exist in DB');
    }
}
