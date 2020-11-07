<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CoordinatingAgency;

class CoordinatingAgencyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/coordinating_agencies', $coordinatingAgency
        );

        $this->assertApiResponse($coordinatingAgency);
    }

    /**
     * @test
     */
    public function test_read_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/coordinating_agencies/'.$coordinatingAgency->id
        );

        $this->assertApiResponse($coordinatingAgency->toArray());
    }

    /**
     * @test
     */
    public function test_update_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();
        $editedCoordinatingAgency = factory(CoordinatingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/coordinating_agencies/'.$coordinatingAgency->id,
            $editedCoordinatingAgency
        );

        $this->assertApiResponse($editedCoordinatingAgency);
    }

    /**
     * @test
     */
    public function test_delete_coordinating_agency()
    {
        $coordinatingAgency = factory(CoordinatingAgency::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/coordinating_agencies/'.$coordinatingAgency->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/coordinating_agencies/'.$coordinatingAgency->id
        );

        $this->response->assertStatus(404);
    }
}
