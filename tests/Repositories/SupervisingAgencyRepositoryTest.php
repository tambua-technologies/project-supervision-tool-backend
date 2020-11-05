<?php namespace Tests\Repositories;

use App\Models\SupervisingAgency;
use App\Repositories\SupervisingAgencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SupervisingAgencyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SupervisingAgencyRepository
     */
    protected $supervisingAgencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->supervisingAgencyRepo = \App::make(SupervisingAgencyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->make()->toArray();

        $createdSupervisingAgency = $this->supervisingAgencyRepo->create($supervisingAgency);

        $createdSupervisingAgency = $createdSupervisingAgency->toArray();
        $this->assertArrayHasKey('id', $createdSupervisingAgency);
        $this->assertNotNull($createdSupervisingAgency['id'], 'Created SupervisingAgency must have id specified');
        $this->assertNotNull(SupervisingAgency::find($createdSupervisingAgency['id']), 'SupervisingAgency with given id must be in DB');
        $this->assertModelData($supervisingAgency, $createdSupervisingAgency);
    }

    /**
     * @test read
     */
    public function test_read_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();

        $dbSupervisingAgency = $this->supervisingAgencyRepo->find($supervisingAgency->id);

        $dbSupervisingAgency = $dbSupervisingAgency->toArray();
        $this->assertModelData($supervisingAgency->toArray(), $dbSupervisingAgency);
    }

    /**
     * @test update
     */
    public function test_update_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();
        $fakeSupervisingAgency = factory(SupervisingAgency::class)->make()->toArray();

        $updatedSupervisingAgency = $this->supervisingAgencyRepo->update($fakeSupervisingAgency, $supervisingAgency->id);

        $this->assertModelData($fakeSupervisingAgency, $updatedSupervisingAgency->toArray());
        $dbSupervisingAgency = $this->supervisingAgencyRepo->find($supervisingAgency->id);
        $this->assertModelData($fakeSupervisingAgency, $dbSupervisingAgency->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();

        $resp = $this->supervisingAgencyRepo->delete($supervisingAgency->id);

        $this->assertTrue($resp);
        $this->assertNull(SupervisingAgency::find($supervisingAgency->id), 'SupervisingAgency should not exist in DB');
    }
}
