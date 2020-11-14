<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContractCost;

class ContractCostApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contract_costs', $contractCost
        );

        $this->assertApiResponse($contractCost);
    }

    /**
     * @test
     */
    public function test_read_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contract_costs/'.$contractCost->id
        );

        $this->assertApiResponse($contractCost->toArray());
    }

    /**
     * @test
     */
    public function test_update_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();
        $editedContractCost = factory(ContractCost::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contract_costs/'.$contractCost->id,
            $editedContractCost
        );

        $this->assertApiResponse($editedContractCost);
    }

    /**
     * @test
     */
    public function test_delete_contract_cost()
    {
        $contractCost = factory(ContractCost::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contract_costs/'.$contractCost->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contract_costs/'.$contractCost->id
        );

        $this->response->assertStatus(404);
    }
}
