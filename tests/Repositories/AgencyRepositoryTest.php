<?php namespace Tests\Repositories;

use App\Models\Agency;
use App\Repositories\ImplementingPartnerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AgencyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImplementingPartnerRepository
     */
    protected $agencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agencyRepo = \App::make(ImplementingPartnerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agency()
    {
        $agency = factory(Agency::class)->make()->toArray();

        $createdAgency = $this->agencyRepo->create($agency);

        $createdAgency = $createdAgency->toArray();
        $this->assertArrayHasKey('id', $createdAgency);
        $this->assertNotNull($createdAgency['id'], 'Created Agency must have id specified');
        $this->assertNotNull(Agency::find($createdAgency['id']), 'Agency with given id must be in DB');
        $this->assertModelData($agency, $createdAgency);
    }

    /**
     * @test read
     */
    public function test_read_agency()
    {
        $agency = factory(Agency::class)->create();

        $dbAgency = $this->agencyRepo->find($agency->id);

        $dbAgency = $dbAgency->toArray();
        $this->assertModelData($agency->toArray(), $dbAgency);
    }

    /**
     * @test update
     */
    public function test_update_agency()
    {
        $agency = factory(Agency::class)->create();
        $fakeAgency = factory(Agency::class)->make()->toArray();

        $updatedAgency = $this->agencyRepo->update($fakeAgency, $agency->id);

        $this->assertModelData($fakeAgency, $updatedAgency->toArray());
        $dbAgency = $this->agencyRepo->find($agency->id);
        $this->assertModelData($fakeAgency, $dbAgency->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agency()
    {
        $agency = factory(Agency::class)->create();

        $resp = $this->agencyRepo->delete($agency->id);

        $this->assertTrue($resp);
        $this->assertNull(Agency::find($agency->id), 'Agency should not exist in DB');
    }
}
