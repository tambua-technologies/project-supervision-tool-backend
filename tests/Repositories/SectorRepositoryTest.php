<?php namespace Tests\Repositories;

use App\Models\Sector;
use App\Repositories\SectorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SectorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SectorRepository
     */
    protected $sectorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sectorRepo = \App::make(SectorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sector()
    {
        $sector = factory(Sector::class)->make()->toArray();

        $createdSector = $this->sectorRepo->create($sector);

        $createdSector = $createdSector->toArray();
        $this->assertArrayHasKey('id', $createdSector);
        $this->assertNotNull($createdSector['id'], 'Created Sector must have id specified');
        $this->assertNotNull(Sector::find($createdSector['id']), 'Sector with given id must be in DB');
        $this->assertModelData($sector, $createdSector);
    }

    /**
     * @test read
     */
    public function test_read_sector()
    {
        $sector = factory(Sector::class)->create();

        $dbSector = $this->sectorRepo->find($sector->id);

        $dbSector = $dbSector->toArray();
        $this->assertModelData($sector->toArray(), $dbSector);
    }

    /**
     * @test update
     */
    public function test_update_sector()
    {
        $sector = factory(Sector::class)->create();
        $fakeSector = factory(Sector::class)->make()->toArray();

        $updatedSector = $this->sectorRepo->update($fakeSector, $sector->id);

        $this->assertModelData($fakeSector, $updatedSector->toArray());
        $dbSector = $this->sectorRepo->find($sector->id);
        $this->assertModelData($fakeSector, $dbSector->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sector()
    {
        $sector = factory(Sector::class)->create();

        $resp = $this->sectorRepo->delete($sector->id);

        $this->assertTrue($resp);
        $this->assertNull(Sector::find($sector->id), 'Sector should not exist in DB');
    }
}
