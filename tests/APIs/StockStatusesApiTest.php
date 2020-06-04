<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockStatuses;

class StockStatusesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_statuses', $stockStatuses
        );

        $this->assertApiResponse($stockStatuses);
    }

    /**
     * @test
     */
    public function test_read_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_statuses/'.$stockStatuses->id
        );

        $this->assertApiResponse($stockStatuses->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();
        $editedStockStatuses = factory(StockStatuses::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_statuses/'.$stockStatuses->id,
            $editedStockStatuses
        );

        $this->assertApiResponse($editedStockStatuses);
    }

    /**
     * @test
     */
    public function test_delete_stock_statuses()
    {
        $stockStatuses = factory(StockStatuses::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_statuses/'.$stockStatuses->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_statuses/'.$stockStatuses->id
        );

        $this->response->assertStatus(404);
    }
}
