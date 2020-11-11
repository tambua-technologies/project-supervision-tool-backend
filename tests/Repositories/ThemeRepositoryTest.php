<?php namespace Tests\Repositories;

use App\Models\Theme;
use App\Repositories\ThemeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ThemeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ThemeRepository
     */
    protected $themeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->themeRepo = \App::make(ThemeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_theme()
    {
        $theme = factory(Theme::class)->make()->toArray();

        $createdTheme = $this->themeRepo->create($theme);

        $createdTheme = $createdTheme->toArray();
        $this->assertArrayHasKey('id', $createdTheme);
        $this->assertNotNull($createdTheme['id'], 'Created Theme must have id specified');
        $this->assertNotNull(Theme::find($createdTheme['id']), 'Theme with given id must be in DB');
        $this->assertModelData($theme, $createdTheme);
    }

    /**
     * @test read
     */
    public function test_read_theme()
    {
        $theme = factory(Theme::class)->create();

        $dbTheme = $this->themeRepo->find($theme->id);

        $dbTheme = $dbTheme->toArray();
        $this->assertModelData($theme->toArray(), $dbTheme);
    }

    /**
     * @test update
     */
    public function test_update_theme()
    {
        $theme = factory(Theme::class)->create();
        $fakeTheme = factory(Theme::class)->make()->toArray();

        $updatedTheme = $this->themeRepo->update($fakeTheme, $theme->id);

        $this->assertModelData($fakeTheme, $updatedTheme->toArray());
        $dbTheme = $this->themeRepo->find($theme->id);
        $this->assertModelData($fakeTheme, $dbTheme->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_theme()
    {
        $theme = factory(Theme::class)->create();

        $resp = $this->themeRepo->delete($theme->id);

        $this->assertTrue($resp);
        $this->assertNull(Theme::find($theme->id), 'Theme should not exist in DB');
    }
}
