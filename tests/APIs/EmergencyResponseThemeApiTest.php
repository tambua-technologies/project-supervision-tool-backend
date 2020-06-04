<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EmergencyResponseTheme;

class EmergencyResponseThemeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/emergency_response_themes', $emergencyResponseTheme
        );

        $this->assertApiResponse($emergencyResponseTheme);
    }

    /**
     * @test
     */
    public function test_read_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/emergency_response_themes/'.$emergencyResponseTheme->id
        );

        $this->assertApiResponse($emergencyResponseTheme->toArray());
    }

    /**
     * @test
     */
    public function test_update_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();
        $editedEmergencyResponseTheme = factory(EmergencyResponseTheme::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/emergency_response_themes/'.$emergencyResponseTheme->id,
            $editedEmergencyResponseTheme
        );

        $this->assertApiResponse($editedEmergencyResponseTheme);
    }

    /**
     * @test
     */
    public function test_delete_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/emergency_response_themes/'.$emergencyResponseTheme->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/emergency_response_themes/'.$emergencyResponseTheme->id
        );

        $this->response->assertStatus(404);
    }
}
