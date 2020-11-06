<?php namespace Tests\Repositories;

use App\Models\ImplementingAgency;
use App\Repositories\ImplementingAgencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ImplementingAgencyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImplementingAgencyRepository
     */
    protected $implementingAgencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->implementingAgencyRepo = \App::make(ImplementingAgencyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->make()->toArray();

        $createdImplementingAgency = $this->implementingAgencyRepo->create($implementingAgency);

        $createdImplementingAgency = $createdImplementingAgency->toArray();
        $this->assertArrayHasKey('id', $createdImplementingAgency);
        $this->assertNotNull($createdImplementingAgency['id'], 'Created ImplementingAgency must have id specified');
        $this->assertNotNull(ImplementingAgency::find($createdImplementingAgency['id']), 'ImplementingAgency with given id must be in DB');
        $this->assertModelData($implementingAgency, $createdImplementingAgency);
    }

    /**
     * @test read
     */
    public function test_read_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();

        $dbImplementingAgency = $this->implementingAgencyRepo->find($implementingAgency->id);

        $dbImplementingAgency = $dbImplementingAgency->toArray();
        $this->assertModelData($implementingAgency->toArray(), $dbImplementingAgency);
    }

    /**
     * @test update
     */
    public function test_update_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();
        $fakeImplementingAgency = factory(ImplementingAgency::class)->make()->toArray();

        $updatedImplementingAgency = $this->implementingAgencyRepo->update($fakeImplementingAgency, $implementingAgency->id);

        $this->assertModelData($fakeImplementingAgency, $updatedImplementingAgency->toArray());
        $dbImplementingAgency = $this->implementingAgencyRepo->find($implementingAgency->id);
        $this->assertModelData($fakeImplementingAgency, $dbImplementingAgency->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();

        $resp = $this->implementingAgencyRepo->delete($implementingAgency->id);

        $this->assertTrue($resp);
        $this->assertNull(ImplementingAgency::find($implementingAgency->id), 'ImplementingAgency should not exist in DB');
    }
}
