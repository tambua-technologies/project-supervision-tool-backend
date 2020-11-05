<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SupervisingAgency;

class SupervisingAgencyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/supervising_agencies', $supervisingAgency
        );

        $this->assertApiResponse($supervisingAgency);
    }

    /**
     * @test
     */
    public function test_read_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/supervising_agencies/'.$supervisingAgency->id
        );

        $this->assertApiResponse($supervisingAgency->toArray());
    }

    /**
     * @test
     */
    public function test_update_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();
        $editedSupervisingAgency = factory(SupervisingAgency::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/supervising_agencies/'.$supervisingAgency->id,
            $editedSupervisingAgency
        );

        $this->assertApiResponse($editedSupervisingAgency);
    }

    /**
     * @test
     */
    public function test_delete_supervising_agency()
    {
        $supervisingAgency = factory(SupervisingAgency::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/supervising_agencies/'.$supervisingAgency->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/supervising_agencies/'.$supervisingAgency->id
        );

        $this->response->assertStatus(404);
    }
}
