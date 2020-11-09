<?php namespace Tests\Repositories;

use App\Models\Money;
use App\Repositories\MoneyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MoneyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MoneyRepository
     */
    protected $moneyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->moneyRepo = \App::make(MoneyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_money()
    {
        $money = factory(Money::class)->make()->toArray();

        $createdMoney = $this->moneyRepo->create($money);

        $createdMoney = $createdMoney->toArray();
        $this->assertArrayHasKey('id', $createdMoney);
        $this->assertNotNull($createdMoney['id'], 'Created Money must have id specified');
        $this->assertNotNull(Money::find($createdMoney['id']), 'Money with given id must be in DB');
        $this->assertModelData($money, $createdMoney);
    }

    /**
     * @test read
     */
    public function test_read_money()
    {
        $money = factory(Money::class)->create();

        $dbMoney = $this->moneyRepo->find($money->id);

        $dbMoney = $dbMoney->toArray();
        $this->assertModelData($money->toArray(), $dbMoney);
    }

    /**
     * @test update
     */
    public function test_update_money()
    {
        $money = factory(Money::class)->create();
        $fakeMoney = factory(Money::class)->make()->toArray();

        $updatedMoney = $this->moneyRepo->update($fakeMoney, $money->id);

        $this->assertModelData($fakeMoney, $updatedMoney->toArray());
        $dbMoney = $this->moneyRepo->find($money->id);
        $this->assertModelData($fakeMoney, $dbMoney->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_money()
    {
        $money = factory(Money::class)->create();

        $resp = $this->moneyRepo->delete($money->id);

        $this->assertTrue($resp);
        $this->assertNull(Money::find($money->id), 'Money should not exist in DB');
    }
}
