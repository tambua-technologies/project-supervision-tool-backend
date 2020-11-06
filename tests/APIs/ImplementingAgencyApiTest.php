<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ImplementingAgency;

class ImplementingAgencyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/implementing_agencies', $implementingAgency
        );

        $this->assertApiResponse($implementingAgency);
    }

    /**
     * @test
     */
    public function test_read_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/implementing_agencies/'.$implementingAgency->id
        );

        $this->assertApiResponse($implementingAgency->toArray());
    }

    /**
     * @test
     */
    public function test_update_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();
        $editedImplementingAgency = factory(ImplementingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/implementing_agencies/'.$implementingAgency->id,
            $editedImplementingAgency
        );

        $this->assertApiResponse($editedImplementingAgency);
    }

    /**
     * @test
     */
    public function test_delete_implementing_agency()
    {
        $implementingAgency = factory(ImplementingAgency::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/implementing_agencies/'.$implementingAgency->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/implementing_agencies/'.$implementingAgency->id
        );

        $this->response->assertStatus(404);
    }
}
