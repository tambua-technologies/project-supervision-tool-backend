<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Agency;

class AgencyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_agency()
    {
        $agency = factory(Agency::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/agencies', $agency
        );

        $this->assertApiResponse($agency);
    }

    /**
     * @test
     */
    public function test_read_agency()
    {
        $agency = factory(Agency::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/agencies/'.$agency->id
        );

        $this->assertApiResponse($agency->toArray());
    }

    /**
     * @test
     */
    public function test_update_agency()
    {
        $agency = factory(Agency::class)->create();
        $editedAgency = factory(Agency::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/agencies/'.$agency->id,
            $editedAgency
        );

        $this->assertApiResponse($editedAgency);
    }

    /**
     * @test
     */
    public function test_delete_agency()
    {
        $agency = factory(Agency::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/agencies/'.$agency->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/agencies/'.$agency->id
        );

        $this->response->assertStatus(404);
    }
}
