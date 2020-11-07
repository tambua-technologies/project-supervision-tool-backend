<?php namespace Tests\Repositories;

use App\Models\CoordinatingAgency;
use App\Repositories\CoordinatingAgencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoordinatingAgencyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoordinatingAgencyRepository
     */
    protected $coordinatingAgencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coordinatingAgencyRepo = \App::make(CoordinatingAgencyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->make()->toArray();

        $createdCoordinatingAgency = $this->coordinatingAgencyRepo->create($coordinatingAgency);

        $createdCoordinatingAgency = $createdCoordinatingAgency->toArray();
        $this->assertArrayHasKey('id', $createdCoordinatingAgency);
        $this->assertNotNull($createdCoordinatingAgency['id'], 'Created CoordinatingAgency must have id specified');
        $this->assertNotNull(CoordinatingAgency::find($createdCoordinatingAgency['id']), 'CoordinatingAgency with given id must be in DB');
        $this->assertModelData($coordinatingAgency, $createdCoordinatingAgency);
    }

    /**
     * @test read
     */
    public function test_read_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();

        $dbCoordinatingAgency = $this->coordinatingAgencyRepo->find($coordinatingAgency->id);

        $dbCoordinatingAgency = $dbCoordinatingAgency->toArray();
        $this->assertModelData($coordinatingAgency->toArray(), $dbCoordinatingAgency);
    }

    /**
     * @test update
     */
    public function test_update_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();
        $fakeCoordinatingAgency = factory(CoordinatingAgency::class)->make()->toArray();

        $updatedCoordinatingAgency = $this->coordinatingAgencyRepo->update($fakeCoordinatingAgency, $coordinatingAgency->id);

        $this->assertModelData($fakeCoordinatingAgency, $updatedCoordinatingAgency->toArray());
        $dbCoordinatingAgency = $this->coordinatingAgencyRepo->find($coordinatingAgency->id);
        $this->assertModelData($fakeCoordinatingAgency, $dbCoordinatingAgency->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();

        $resp = $this->coordinatingAgencyRepo->delete($coordinatingAgency->id);

        $this->assertTrue($resp);
        $this->assertNull(CoordinatingAgency::find($coordinatingAgency->id), 'CoordinatingAgency should not exist in DB');
    }
}
