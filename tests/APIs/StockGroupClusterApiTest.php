<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockGroupCluster;

class StockGroupClusterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_group_clusters', $stockGroupCluster
        );

        $this->assertApiResponse($stockGroupCluster);
    }

    /**
     * @test
     */
    public function test_read_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_group_clusters/'.$stockGroupCluster->id
        );

        $this->assertApiResponse($stockGroupCluster->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();
        $editedStockGroupCluster = factory(StockGroupCluster::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_group_clusters/'.$stockGroupCluster->id,
            $editedStockGroupCluster
        );

        $this->assertApiResponse($editedStockGroupCluster);
    }

    /**
     * @test
     */
    public function test_delete_stock_group_cluster()
    {
        $stockGroupCluster = factory(StockGroupCluster::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_group_clusters/'.$stockGroupCluster->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_group_clusters/'.$stockGroupCluster->id
        );

        $this->response->assertStatus(404);
    }
}
