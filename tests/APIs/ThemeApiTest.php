<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Theme;

class ThemeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_theme()
    {
        $theme = factory(Theme::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/themes', $theme
        );

        $this->assertApiResponse($theme);
    }

    /**
     * @test
     */
    public function test_read_theme()
    {
        $theme = factory(Theme::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/themes/'.$theme->id
        );

        $this->assertApiResponse($theme->toArray());
    }

    /**
     * @test
     */
    public function test_update_theme()
    {
        $theme = factory(Theme::class)->create();
        $editedTheme = factory(Theme::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/themes/'.$theme->id,
            $editedTheme
        );

        $this->assertApiResponse($editedTheme);
    }

    /**
     * @test
     */
    public function test_delete_theme()
    {
        $theme = factory(Theme::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/themes/'.$theme->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/themes/'.$theme->id
        );

        $this->response->assertStatus(404);
    }
}
