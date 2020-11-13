<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubProjectEquipment;

class SubProjectEquipmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_project_equipments', $subProjectEquipment
        );

        $this->assertApiResponse($subProjectEquipment);
    }

    /**
     * @test
     */
    public function test_read_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_project_equipments/'.$subProjectEquipment->id
        );

        $this->assertApiResponse($subProjectEquipment->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();
        $editedSubProjectEquipment = factory(SubProjectEquipment::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_project_equipments/'.$subProjectEquipment->id,
            $editedSubProjectEquipment
        );

        $this->assertApiResponse($editedSubProjectEquipment);
    }

    /**
     * @test
     */
    public function test_delete_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_project_equipments/'.$subProjectEquipment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_project_equipments/'.$subProjectEquipment->id
        );

        $this->response->assertStatus(404);
    }
}
