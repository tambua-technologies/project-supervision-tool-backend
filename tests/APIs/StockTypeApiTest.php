<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockType;

class StockTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_type()
    {
        $stockType = factory(StockType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_types', $stockType
        );

        $this->assertApiResponse($stockType);
    }

    /**
     * @test
     */
    public function test_read_stock_type()
    {
        $stockType = factory(StockType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_types/'.$stockType->id
        );

        $this->assertApiResponse($stockType->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_type()
    {
        $stockType = factory(StockType::class)->create();
        $editedStockType = factory(StockType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_types/'.$stockType->id,
            $editedStockType
        );

        $this->assertApiResponse($editedStockType);
    }

    /**
     * @test
     */
    public function test_delete_stock_type()
    {
        $stockType = factory(StockType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_types/'.$stockType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_types/'.$stockType->id
        );

        $this->response->assertStatus(404);
    }
}
