<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sector;

class SectorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sector()
    {
        $sector = factory(Sector::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sectors', $sector
        );

        $this->assertApiResponse($sector);
    }

    /**
     * @test
     */
    public function test_read_sector()
    {
        $sector = factory(Sector::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sectors/'.$sector->id
        );

        $this->assertApiResponse($sector->toArray());
    }

    /**
     * @test
     */
    public function test_update_sector()
    {
        $sector = factory(Sector::class)->create();
        $editedSector = factory(Sector::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sectors/'.$sector->id,
            $editedSector
        );

        $this->assertApiResponse($editedSector);
    }

    /**
     * @test
     */
    public function test_delete_sector()
    {
        $sector = factory(Sector::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sectors/'.$sector->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sectors/'.$sector->id
        );

        $this->response->assertStatus(404);
    }
}
