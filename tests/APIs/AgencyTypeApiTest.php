<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AgencyType;

class AgencyTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_agency_type()
    {
        $agencyType = factory(AgencyType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/agency_types', $agencyType
        );

        $this->assertApiResponse($agencyType);
    }

    /**
     * @test
     */
    public function test_read_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/agency_types/'.$agencyType->id
        );

        $this->assertApiResponse($agencyType->toArray());
    }

    /**
     * @test
     */
    public function test_update_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();
        $editedAgencyType = factory(AgencyType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/agency_types/'.$agencyType->id,
            $editedAgencyType
        );

        $this->assertApiResponse($editedAgencyType);
    }

    /**
     * @test
     */
    public function test_delete_agency_type()
    {
        $agencyType = factory(AgencyType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/agency_types/'.$agencyType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/agency_types/'.$agencyType->id
        );

        $this->response->assertStatus(404);
    }
}
