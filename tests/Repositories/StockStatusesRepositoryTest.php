<?php namespace Tests\Repositories;

use App\Models\StockStatuses;
use App\Repositories\StockStatusesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockStatusesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockStatusesRepository
     */
    protected $stockStatusesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockStatusesRepo = \App::make(StockStatusesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->make()->toArray();

        $createdStockStatuses = $this->stockStatusesRepo->create($stockStatuses);

        $createdStockStatuses = $createdStockStatuses->toArray();
        $this->assertArrayHasKey('id', $createdStockStatuses);
        $this->assertNotNull($createdStockStatuses['id'], 'Created StockStatuses must have id specified');
        $this->assertNotNull(StockStatuses::find($createdStockStatuses['id']), 'StockStatuses with given id must be in DB');
        $this->assertModelData($stockStatuses, $createdStockStatuses);
    }

    /**
     * @test read
     */
    public function test_read_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();

        $dbStockStatuses = $this->stockStatusesRepo->find($stockStatuses->id);

        $dbStockStatuses = $dbStockStatuses->toArray();
        $this->assertModelData($stockStatuses->toArray(), $dbStockStatuses);
    }

    /**
     * @test update
     */
    public function test_update_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();
        $fakeStockStatuses = factory(StockStatuses::class)->make()->toArray();

        $updatedStockStatuses = $this->stockStatusesRepo->update($fakeStockStatuses, $stockStatuses->id);

        $this->assertModelData($fakeStockStatuses, $updatedStockStatuses->toArray());
        $dbStockStatuses = $this->stockStatusesRepo->find($stockStatuses->id);
        $this->assertModelData($fakeStockStatuses, $dbStockStatuses->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();

        $resp = $this->stockStatusesRepo->delete($stockStatuses->id);

        $this->assertTrue($resp);
        $this->assertNull(StockStatuses::find($stockStatuses->id), 'StockStatuses should not exist in DB');
    }
}
