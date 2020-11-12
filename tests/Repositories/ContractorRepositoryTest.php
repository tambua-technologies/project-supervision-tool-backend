<?php namespace Tests\Repositories;

use App\Models\Contractor;
use App\Repositories\ContractorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContractorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContractorRepository
     */
    protected $contractorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contractorRepo = \App::make(ContractorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contractor()
    {
        $contractor = factory(Contractor::class)->make()->toArray();

        $createdContractor = $this->contractorRepo->create($contractor);

        $createdContractor = $createdContractor->toArray();
        $this->assertArrayHasKey('id', $createdContractor);
        $this->assertNotNull($createdContractor['id'], 'Created Contractor must have id specified');
        $this->assertNotNull(Contractor::find($createdContractor['id']), 'Contractor with given id must be in DB');
        $this->assertModelData($contractor, $createdContractor);
    }

    /**
     * @test read
     */
    public function test_read_contractor()
    {
        $contractor = factory(Contractor::class)->create();

        $dbContractor = $this->contractorRepo->find($contractor->id);

        $dbContractor = $dbContractor->toArray();
        $this->assertModelData($contractor->toArray(), $dbContractor);
    }

    /**
     * @test update
     */
    public function test_update_contractor()
    {
        $contractor = factory(Contractor::class)->create();
        $fakeContractor = factory(Contractor::class)->make()->toArray();

        $updatedContractor = $this->contractorRepo->update($fakeContractor, $contractor->id);

        $this->assertModelData($fakeContractor, $updatedContractor->toArray());
        $dbContractor = $this->contractorRepo->find($contractor->id);
        $this->assertModelData($fakeContractor, $dbContractor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contractor()
    {
        $contractor = factory(Contractor::class)->create();

        $resp = $this->contractorRepo->delete($contractor->id);

        $this->assertTrue($resp);
        $this->assertNull(Contractor::find($contractor->id), 'Contractor should not exist in DB');
    }
}
