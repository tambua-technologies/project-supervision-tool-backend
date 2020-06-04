<?php namespace Tests\Repositories;

use App\Models\EmergencyResponseTheme;
use App\Repositories\EmergencyResponseThemeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EmergencyResponseThemeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmergencyResponseThemeRepository
     */
    protected $emergencyResponseThemeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->emergencyResponseThemeRepo = \App::make(EmergencyResponseThemeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->make()->toArray();

        $createdEmergencyResponseTheme = $this->emergencyResponseThemeRepo->create($emergencyResponseTheme);

        $createdEmergencyResponseTheme = $createdEmergencyResponseTheme->toArray();
        $this->assertArrayHasKey('id', $createdEmergencyResponseTheme);
        $this->assertNotNull($createdEmergencyResponseTheme['id'], 'Created EmergencyResponseTheme must have id specified');
        $this->assertNotNull(EmergencyResponseTheme::find($createdEmergencyResponseTheme['id']), 'EmergencyResponseTheme with given id must be in DB');
        $this->assertModelData($emergencyResponseTheme, $createdEmergencyResponseTheme);
    }

    /**
     * @test read
     */
    public function test_read_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();

        $dbEmergencyResponseTheme = $this->emergencyResponseThemeRepo->find($emergencyResponseTheme->id);

        $dbEmergencyResponseTheme = $dbEmergencyResponseTheme->toArray();
        $this->assertModelData($emergencyResponseTheme->toArray(), $dbEmergencyResponseTheme);
    }

    /**
     * @test update
     */
    public function test_update_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();
        $fakeEmergencyResponseTheme = factory(EmergencyResponseTheme::class)->make()->toArray();

        $updatedEmergencyResponseTheme = $this->emergencyResponseThemeRepo->update($fakeEmergencyResponseTheme, $emergencyResponseTheme->id);

        $this->assertModelData($fakeEmergencyResponseTheme, $updatedEmergencyResponseTheme->toArray());
        $dbEmergencyResponseTheme = $this->emergencyResponseThemeRepo->find($emergencyResponseTheme->id);
        $this->assertModelData($fakeEmergencyResponseTheme, $dbEmergencyResponseTheme->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_emergency_response_theme()
    {
        $emergencyResponseTheme = factory(EmergencyResponseTheme::class)->create();

        $resp = $this->emergencyResponseThemeRepo->delete($emergencyResponseTheme->id);

        $this->assertTrue($resp);
        $this->assertNull(EmergencyResponseTheme::find($emergencyResponseTheme->id), 'EmergencyResponseTheme should not exist in DB');
    }
}
