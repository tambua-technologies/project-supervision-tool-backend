<?php namespace Tests\Repositories;

use App\Models\Position;
use App\Repositories\PositionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PositionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PositionRepository
     */
    protected $positionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->positionRepo = \App::make(PositionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_position()
    {
        $position = factory(Position::class)->make()->toArray();

        $createdPosition = $this->positionRepo->create($position);

        $createdPosition = $createdPosition->toArray();
        $this->assertArrayHasKey('id', $createdPosition);
        $this->assertNotNull($createdPosition['id'], 'Created Position must have id specified');
        $this->assertNotNull(Position::find($createdPosition['id']), 'Position with given id must be in DB');
        $this->assertModelData($position, $createdPosition);
    }

    /**
     * @test read
     */
    public function test_read_position()
    {
        $position = factory(Position::class)->create();

        $dbPosition = $this->positionRepo->find($position->id);

        $dbPosition = $dbPosition->toArray();
        $this->assertModelData($position->toArray(), $dbPosition);
    }

    /**
     * @test update
     */
    public function test_update_position()
    {
        $position = factory(Position::class)->create();
        $fakePosition = factory(Position::class)->make()->toArray();

        $updatedPosition = $this->positionRepo->update($fakePosition, $position->id);

        $this->assertModelData($fakePosition, $updatedPosition->toArray());
        $dbPosition = $this->positionRepo->find($position->id);
        $this->assertModelData($fakePosition, $dbPosition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_position()
    {
        $position = factory(Position::class)->create();

        $resp = $this->positionRepo->delete($position->id);

        $this->assertTrue($resp);
        $this->assertNull(Position::find($position->id), 'Position should not exist in DB');
    }
}
