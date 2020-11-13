<?php namespace Tests\Repositories;

use App\Models\SubProjectEquipment;
use App\Repositories\SubProjectEquipmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubProjectEquipmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubProjectEquipmentRepository
     */
    protected $subProjectEquipmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subProjectEquipmentRepo = \App::make(SubProjectEquipmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->make()->toArray();

        $createdSubProjectEquipment = $this->subProjectEquipmentRepo->create($subProjectEquipment);

        $createdSubProjectEquipment = $createdSubProjectEquipment->toArray();
        $this->assertArrayHasKey('id', $createdSubProjectEquipment);
        $this->assertNotNull($createdSubProjectEquipment['id'], 'Created SubProjectEquipment must have id specified');
        $this->assertNotNull(SubProjectEquipment::find($createdSubProjectEquipment['id']), 'SubProjectEquipment with given id must be in DB');
        $this->assertModelData($subProjectEquipment, $createdSubProjectEquipment);
    }

    /**
     * @test read
     */
    public function test_read_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();

        $dbSubProjectEquipment = $this->subProjectEquipmentRepo->find($subProjectEquipment->id);

        $dbSubProjectEquipment = $dbSubProjectEquipment->toArray();
        $this->assertModelData($subProjectEquipment->toArray(), $dbSubProjectEquipment);
    }

    /**
     * @test update
     */
    public function test_update_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();
        $fakeSubProjectEquipment = factory(SubProjectEquipment::class)->make()->toArray();

        $updatedSubProjectEquipment = $this->subProjectEquipmentRepo->update($fakeSubProjectEquipment, $subProjectEquipment->id);

        $this->assertModelData($fakeSubProjectEquipment, $updatedSubProjectEquipment->toArray());
        $dbSubProjectEquipment = $this->subProjectEquipmentRepo->find($subProjectEquipment->id);
        $this->assertModelData($fakeSubProjectEquipment, $dbSubProjectEquipment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_project_equipment()
    {
        $subProjectEquipment = factory(SubProjectEquipment::class)->create();

        $resp = $this->subProjectEquipmentRepo->delete($subProjectEquipment->id);

        $this->assertTrue($resp);
        $this->assertNull(SubProjectEquipment::find($subProjectEquipment->id), 'SubProjectEquipment should not exist in DB');
    }
}
