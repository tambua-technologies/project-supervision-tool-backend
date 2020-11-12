<?php namespace Tests\Repositories;

use App\Models\Phase;
use App\Repositories\PhaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PhaseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PhaseRepository
     */
    protected $phaseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->phaseRepo = \App::make(PhaseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_phase()
    {
        $phase = factory(Phase::class)->make()->toArray();

        $createdPhase = $this->phaseRepo->create($phase);

        $createdPhase = $createdPhase->toArray();
        $this->assertArrayHasKey('id', $createdPhase);
        $this->assertNotNull($createdPhase['id'], 'Created Phase must have id specified');
        $this->assertNotNull(Phase::find($createdPhase['id']), 'Phase with given id must be in DB');
        $this->assertModelData($phase, $createdPhase);
    }

    /**
     * @test read
     */
    public function test_read_phase()
    {
        $phase = factory(Phase::class)->create();

        $dbPhase = $this->phaseRepo->find($phase->id);

        $dbPhase = $dbPhase->toArray();
        $this->assertModelData($phase->toArray(), $dbPhase);
    }

    /**
     * @test update
     */
    public function test_update_phase()
    {
        $phase = factory(Phase::class)->create();
        $fakePhase = factory(Phase::class)->make()->toArray();

        $updatedPhase = $this->phaseRepo->update($fakePhase, $phase->id);

        $this->assertModelData($fakePhase, $updatedPhase->toArray());
        $dbPhase = $this->phaseRepo->find($phase->id);
        $this->assertModelData($fakePhase, $dbPhase->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_phase()
    {
        $phase = factory(Phase::class)->create();

        $resp = $this->phaseRepo->delete($phase->id);

        $this->assertTrue($resp);
        $this->assertNull(Phase::find($phase->id), 'Phase should not exist in DB');
    }
}
