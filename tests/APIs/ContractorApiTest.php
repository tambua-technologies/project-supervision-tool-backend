<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Contractor;

class ContractorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contractor()
    {
        $contractor = factory(Contractor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contractors', $contractor
        );

        $this->assertApiResponse($contractor);
    }

    /**
     * @test
     */
    public function test_read_contractor()
    {
        $contractor = factory(Contractor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contractors/'.$contractor->id
        );

        $this->assertApiResponse($contractor->toArray());
    }

    /**
     * @test
     */
    public function test_update_contractor()
    {
        $contractor = factory(Contractor::class)->create();
        $editedContractor = factory(Contractor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contractors/'.$contractor->id,
            $editedContractor
        );

        $this->assertApiResponse($editedContractor);
    }

    /**
     * @test
     */
    public function test_delete_contractor()
    {
        $contractor = factory(Contractor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contractors/'.$contractor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contractors/'.$contractor->id
        );

        $this->response->assertStatus(404);
    }
}
