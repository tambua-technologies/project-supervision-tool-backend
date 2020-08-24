<?php namespace Tests\Repositories;

use App\Models\InitiativeType;
use App\Repositories\InitiativeTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InitiativeTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var InitiativeTypeRepository
     */
    protected $initiativeTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->initiativeTypeRepo = \App::make(InitiativeTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->make()->toArray();

        $createdInitiativeType = $this->initiativeTypeRepo->create($initiativeType);

        $createdInitiativeType = $createdInitiativeType->toArray();
        $this->assertArrayHasKey('id', $createdInitiativeType);
        $this->assertNotNull($createdInitiativeType['id'], 'Created InitiativeType must have id specified');
        $this->assertNotNull(InitiativeType::find($createdInitiativeType['id']), 'InitiativeType with given id must be in DB');
        $this->assertModelData($initiativeType, $createdInitiativeType);
    }

    /**
     * @test read
     */
    public function test_read_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();

        $dbInitiativeType = $this->initiativeTypeRepo->find($initiativeType->id);

        $dbInitiativeType = $dbInitiativeType->toArray();
        $this->assertModelData($initiativeType->toArray(), $dbInitiativeType);
    }

    /**
     * @test update
     */
    public function test_update_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();
        $fakeInitiativeType = factory(InitiativeType::class)->make()->toArray();

        $updatedInitiativeType = $this->initiativeTypeRepo->update($fakeInitiativeType, $initiativeType->id);

        $this->assertModelData($fakeInitiativeType, $updatedInitiativeType->toArray());
        $dbInitiativeType = $this->initiativeTypeRepo->find($initiativeType->id);
        $this->assertModelData($fakeInitiativeType, $dbInitiativeType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_initiative_type()
    {
        $initiativeType = factory(InitiativeType::class)->create();

        $resp = $this->initiativeTypeRepo->delete($initiativeType->id);

        $this->assertTrue($resp);
        $this->assertNull(InitiativeType::find($initiativeType->id), 'InitiativeType should not exist in DB');
    }
}
