<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FundingOrganisation;

class FundingOrganisationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/funding_organisations', $fundingOrganisation
        );

        $this->assertApiResponse($fundingOrganisation);
    }

    /**
     * @test
     */
    public function test_read_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/funding_organisations/'.$fundingOrganisation->id
        );

        $this->assertApiResponse($fundingOrganisation->toArray());
    }

    /**
     * @test
     */
    public function test_update_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();
        $editedFundingOrganisation = factory(FundingOrganisation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/funding_organisations/'.$fundingOrganisation->id,
            $editedFundingOrganisation
        );

        $this->assertApiResponse($editedFundingOrganisation);
    }

    /**
     * @test
     */
    public function test_delete_funding_organisation()
    {
        $fundingOrganisation = factory(FundingOrganisation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/funding_organisations/'.$fundingOrganisation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/funding_organisations/'.$fundingOrganisation->id
        );

        $this->response->assertStatus(404);
    }
}
