<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Money;

class MoneyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_money()
    {
        $money = factory(Money::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/money', $money
        );

        $this->assertApiResponse($money);
    }

    /**
     * @test
     */
    public function test_read_money()
    {
        $money = factory(Money::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/money/'.$money->id
        );

        $this->assertApiResponse($money->toArray());
    }

    /**
     * @test
     */
    public function test_update_money()
    {
        $money = factory(Money::class)->create();
        $editedMoney = factory(Money::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/money/'.$money->id,
            $editedMoney
        );

        $this->assertApiResponse($editedMoney);
    }

    /**
     * @test
     */
    public function test_delete_money()
    {
        $money = factory(Money::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/money/'.$money->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/money/'.$money->id
        );

        $this->response->assertStatus(404);
    }
}
