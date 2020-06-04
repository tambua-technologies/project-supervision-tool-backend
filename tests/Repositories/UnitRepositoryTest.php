<?php namespace Tests\Repositories;

use App\Models\Unit;
use App\Repositories\UnitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UnitRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UnitRepository
     */
    protected $unitRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->unitRepo = \App::make(UnitRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_unit()
    {
        $unit = factory(Unit::class)->make()->toArray();

        $createdUnit = $this->unitRepo->create($unit);

        $createdUnit = $createdUnit->toArray();
        $this->assertArrayHasKey('id', $createdUnit);
        $this->assertNotNull($createdUnit['id'], 'Created Unit must have id specified');
        $this->assertNotNull(Unit::find($createdUnit['id']), 'Unit with given id must be in DB');
        $this->assertModelData($unit, $createdUnit);
    }

    /**
     * @test read
     */
    public function test_read_unit()
    {
        $unit = factory(Unit::class)->create();

        $dbUnit = $this->unitRepo->find($unit->id);

        $dbUnit = $dbUnit->toArray();
        $this->assertModelData($unit->toArray(), $dbUnit);
    }

    /**
     * @test update
     */
    public function test_update_unit()
    {
        $unit = factory(Unit::class)->create();
        $fakeUnit = factory(Unit::class)->make()->toArray();

        $updatedUnit = $this->unitRepo->update($fakeUnit, $unit->id);

        $this->assertModelData($fakeUnit, $updatedUnit->toArray());
        $dbUnit = $this->unitRepo->find($unit->id);
        $this->assertModelData($fakeUnit, $dbUnit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_unit()
    {
        $unit = factory(Unit::class)->create();

        $resp = $this->unitRepo->delete($unit->id);

        $this->assertTrue($resp);
        $this->assertNull(Unit::find($unit->id), 'Unit should not exist in DB');
    }
}
