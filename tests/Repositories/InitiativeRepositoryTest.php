<?php namespace Tests\Repositories;

use App\Models\Initiative;
use App\Repositories\InitiativeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InitiativeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var InitiativeRepository
     */
    protected $initiativeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->initiativeRepo = \App::make(InitiativeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_initiative()
    {
        $initiative = factory(Initiative::class)->make()->toArray();

        $createdInitiative = $this->initiativeRepo->create($initiative);

        $createdInitiative = $createdInitiative->toArray();
        $this->assertArrayHasKey('id', $createdInitiative);
        $this->assertNotNull($createdInitiative['id'], 'Created Initiative must have id specified');
        $this->assertNotNull(Initiative::find($createdInitiative['id']), 'Initiative with given id must be in DB');
        $this->assertModelData($initiative, $createdInitiative);
    }

    /**
     * @test read
     */
    public function test_read_initiative()
    {
        $initiative = factory(Initiative::class)->create();

        $dbInitiative = $this->initiativeRepo->find($initiative->id);

        $dbInitiative = $dbInitiative->toArray();
        $this->assertModelData($initiative->toArray(), $dbInitiative);
    }

    /**
     * @test update
     */
    public function test_update_initiative()
    {
        $initiative = factory(Initiative::class)->create();
        $fakeInitiative = factory(Initiative::class)->make()->toArray();

        $updatedInitiative = $this->initiativeRepo->update($fakeInitiative, $initiative->id);

        $this->assertModelData($fakeInitiative, $updatedInitiative->toArray());
        $dbInitiative = $this->initiativeRepo->find($initiative->id);
        $this->assertModelData($fakeInitiative, $dbInitiative->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_initiative()
    {
        $initiative = factory(Initiative::class)->create();

        $resp = $this->initiativeRepo->delete($initiative->id);

        $this->assertTrue($resp);
        $this->assertNull(Initiative::find($initiative->id), 'Initiative should not exist in DB');
    }
}
