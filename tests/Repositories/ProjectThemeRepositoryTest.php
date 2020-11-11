<?php namespace Tests\Repositories;

use App\Models\ProjectTheme;
use App\Repositories\ProjectThemeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProjectThemeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectThemeRepository
     */
    protected $projectThemeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->projectThemeRepo = \App::make(ProjectThemeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->make()->toArray();

        $createdProjectTheme = $this->projectThemeRepo->create($projectTheme);

        $createdProjectTheme = $createdProjectTheme->toArray();
        $this->assertArrayHasKey('id', $createdProjectTheme);
        $this->assertNotNull($createdProjectTheme['id'], 'Created ProjectTheme must have id specified');
        $this->assertNotNull(ProjectTheme::find($createdProjectTheme['id']), 'ProjectTheme with given id must be in DB');
        $this->assertModelData($projectTheme, $createdProjectTheme);
    }

    /**
     * @test read
     */
    public function test_read_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();

        $dbProjectTheme = $this->projectThemeRepo->find($projectTheme->id);

        $dbProjectTheme = $dbProjectTheme->toArray();
        $this->assertModelData($projectTheme->toArray(), $dbProjectTheme);
    }

    /**
     * @test update
     */
    public function test_update_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();
        $fakeProjectTheme = factory(ProjectTheme::class)->make()->toArray();

        $updatedProjectTheme = $this->projectThemeRepo->update($fakeProjectTheme, $projectTheme->id);

        $this->assertModelData($fakeProjectTheme, $updatedProjectTheme->toArray());
        $dbProjectTheme = $this->projectThemeRepo->find($projectTheme->id);
        $this->assertModelData($fakeProjectTheme, $dbProjectTheme->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_project_theme()
    {
        $projectTheme = factory(ProjectTheme::class)->create();

        $resp = $this->projectThemeRepo->delete($projectTheme->id);

        $this->assertTrue($resp);
        $this->assertNull(ProjectTheme::find($projectTheme->id), 'ProjectTheme should not exist in DB');
    }
}
