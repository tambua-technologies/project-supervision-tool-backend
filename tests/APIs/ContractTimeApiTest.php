<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContractTime;

class ContractTimeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contract_time()
    {
        $contractTime = factory(ContractTime::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contract_times', $contractTime
        );

        $this->assertApiResponse($contractTime);
    }

    /**
     * @test
     */
    public function test_read_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contract_times/'.$contractTime->id
        );

        $this->assertApiResponse($contractTime->toArray());
    }

    /**
     * @test
     */
    public function test_update_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();
        $editedContractTime = factory(ContractTime::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contract_times/'.$contractTime->id,
            $editedContractTime
        );

        $this->assertApiResponse($editedContractTime);
    }

    /**
     * @test
     */
    public function test_delete_contract_time()
    {
        $contractTime = factory(ContractTime::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contract_times/'.$contractTime->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contract_times/'.$contractTime->id
        );

        $this->response->assertStatus(404);
    }
}
