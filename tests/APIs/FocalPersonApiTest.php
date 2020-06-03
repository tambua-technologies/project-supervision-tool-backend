<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FocalPerson;

class FocalPersonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/focal_people', $focalPerson
        );

        $this->assertApiResponse($focalPerson);
    }

    /**
     * @test
     */
    public function test_read_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/focal_people/'.$focalPerson->id
        );

        $this->assertApiResponse($focalPerson->toArray());
    }

    /**
     * @test
     */
    public function test_update_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();
        $editedFocalPerson = factory(FocalPerson::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/focal_people/'.$focalPerson->id,
            $editedFocalPerson
        );

        $this->assertApiResponse($editedFocalPerson);
    }

    /**
     * @test
     */
    public function test_delete_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/focal_people/'.$focalPerson->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/focal_people/'.$focalPerson->id
        );

        $this->response->assertStatus(404);
    }
}
