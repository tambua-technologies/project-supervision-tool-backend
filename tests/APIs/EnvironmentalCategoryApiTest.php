<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EnvironmentalCategory;

class EnvironmentalCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/environmental_categories', $environmentalCategory
        );

        $this->assertApiResponse($environmentalCategory);
    }

    /**
     * @test
     */
    public function test_read_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/environmental_categories/'.$environmentalCategory->id
        );

        $this->assertApiResponse($environmentalCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();
        $editedEnvironmentalCategory = factory(EnvironmentalCategory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/environmental_categories/'.$environmentalCategory->id,
            $editedEnvironmentalCategory
        );

        $this->assertApiResponse($editedEnvironmentalCategory);
    }

    /**
     * @test
     */
    public function test_delete_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/environmental_categories/'.$environmentalCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/environmental_categories/'.$environmentalCategory->id
        );

        $this->response->assertStatus(404);
    }
}
