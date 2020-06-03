<?php namespace Tests\Repositories;

use App\Models\AgencyType;
use App\Repositories\AgencyTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AgencyTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgencyTypeRepository
     */
    protected $agencyTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agencyTypeRepo = \App::make(AgencyTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agency_type()
    {
        $agencyType = factory(AgencyType::class)->make()->toArray();

        $createdAgencyType = $this->agencyTypeRepo->create($agencyType);

        $createdAgencyType = $createdAgencyType->toArray();
        $this->assertArrayHasKey('id', $createdAgencyType);
        $this->assertNotNull($createdAgencyType['id'], 'Created AgencyType must have id specified');
        $this->assertNotNull(AgencyType::find($createdAgencyType['id']), 'AgencyType with given id must be in DB');
        $this->assertModelData($agencyType, $createdAgencyType);
    }

    /**
     * @test read
     */
    public function test_read_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();

        $dbAgencyType = $this->agencyTypeRepo->find($agencyType->id);

        $dbAgencyType = $dbAgencyType->toArray();
        $this->assertModelData($agencyType->toArray(), $dbAgencyType);
    }

    /**
     * @test update
     */
    public function test_update_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();
        $fakeAgencyType = factory(AgencyType::class)->make()->toArray();

        $updatedAgencyType = $this->agencyTypeRepo->update($fakeAgencyType, $agencyType->id);

        $this->assertModelData($fakeAgencyType, $updatedAgencyType->toArray());
        $dbAgencyType = $this->agencyTypeRepo->find($agencyType->id);
        $this->assertModelData($fakeAgencyType, $dbAgencyType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();

        $resp = $this->agencyTypeRepo->delete($agencyType->id);

        $this->assertTrue($resp);
        $this->assertNull(AgencyType::find($agencyType->id), 'AgencyType should not exist in DB');
    }
}
