<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockGroup;

class StockGroupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_groups', $stockGroup
        );

        $this->assertApiResponse($stockGroup);
    }

    /**
     * @test
     */
    public function test_read_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_groups/'.$stockGroup->id
        );

        $this->assertApiResponse($stockGroup->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();
        $editedStockGroup = factory(StockGroup::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_groups/'.$stockGroup->id,
            $editedStockGroup
        );

        $this->assertApiResponse($editedStockGroup);
    }

    /**
     * @test
     */
    public function test_delete_stock_group()
    {
        $stockGroup = factory(StockGroup::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_groups/'.$stockGroup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_groups/'.$stockGroup->id
        );

        $this->response->assertStatus(404);
    }
}
