<?php namespace Tests\Repositories;

use App\Models\FundingOrganisation;
use App\Repositories\FundingOrganisationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FundingOrganisationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FundingOrganisationRepository
     */
    protected $fundingOrganisationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fundingOrganisationRepo = \App::make(FundingOrganisationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->make()->toArray();

        $createdFundingOrganisation = $this->fundingOrganisationRepo->create($fundingOrganisation);

        $createdFundingOrganisation = $createdFundingOrganisation->toArray();
        $this->assertArrayHasKey('id', $createdFundingOrganisation);
        $this->assertNotNull($createdFundingOrganisation['id'], 'Created FundingOrganisation must have id specified');
        $this->assertNotNull(FundingOrganisation::find($createdFundingOrganisation['id']), 'FundingOrganisation with given id must be in DB');
        $this->assertModelData($fundingOrganisation, $createdFundingOrganisation);
    }

    /**
     * @test read
     */
    public function test_read_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();

        $dbFundingOrganisation = $this->fundingOrganisationRepo->find($fundingOrganisation->id);

        $dbFundingOrganisation = $dbFundingOrganisation->toArray();
        $this->assertModelData($fundingOrganisation->toArray(), $dbFundingOrganisation);
    }

    /**
     * @test update
     */
    public function test_update_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();
        $fakeFundingOrganisation = factory(FundingOrganisation::class)->make()->toArray();

        $updatedFundingOrganisation = $this->fundingOrganisationRepo->update($fakeFundingOrganisation, $fundingOrganisation->id);

        $this->assertModelData($fakeFundingOrganisation, $updatedFundingOrganisation->toArray());
        $dbFundingOrganisation = $this->fundingOrganisationRepo->find($fundingOrganisation->id);
        $this->assertModelData($fakeFundingOrganisation, $dbFundingOrganisation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();

        $resp = $this->fundingOrganisationRepo->delete($fundingOrganisation->id);

        $this->assertTrue($resp);
        $this->assertNull(FundingOrganisation::find($fundingOrganisation->id), 'FundingOrganisation should not exist in DB');
    }
}
