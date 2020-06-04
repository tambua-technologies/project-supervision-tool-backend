<?php namespace Tests\Repositories;

use App\Models\StockGroup;
use App\Repositories\StockGroupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockGroupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockGroupRepository
     */
    protected $stockGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockGroupRepo = \App::make(StockGroupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->make()->toArray();

        $createdStockGroup = $this->stockGroupRepo->create($stockGroup);

        $createdStockGroup = $createdStockGroup->toArray();
        $this->assertArrayHasKey('id', $createdStockGroup);
        $this->assertNotNull($createdStockGroup['id'], 'Created StockGroup must have id specified');
        $this->assertNotNull(StockGroup::find($createdStockGroup['id']), 'StockGroup with given id must be in DB');
        $this->assertModelData($stockGroup, $createdStockGroup);
    }

    /**
     * @test read
     */
    public function test_read_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();

        $dbStockGroup = $this->stockGroupRepo->find($stockGroup->id);

        $dbStockGroup = $dbStockGroup->toArray();
        $this->assertModelData($stockGroup->toArray(), $dbStockGroup);
    }

    /**
     * @test update
     */
    public function test_update_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();
        $fakeStockGroup = factory(StockGroup::class)->make()->toArray();

        $updatedStockGroup = $this->stockGroupRepo->update($fakeStockGroup, $stockGroup->id);

        $this->assertModelData($fakeStockGroup, $updatedStockGroup->toArray());
        $dbStockGroup = $this->stockGroupRepo->find($stockGroup->id);
        $this->assertModelData($fakeStockGroup, $dbStockGroup->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();

        $resp = $this->stockGroupRepo->delete($stockGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(StockGroup::find($stockGroup->id), 'StockGroup should not exist in DB');
    }
}
