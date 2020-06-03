<?php namespace Tests\Repositories;

use App\Models\FocalPerson;
use App\Repositories\FocalPersonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FocalPersonRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FocalPersonRepository
     */
    protected $focalPersonRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->focalPersonRepo = \App::make(FocalPersonRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->make()->toArray();

        $createdFocalPerson = $this->focalPersonRepo->create($focalPerson);

        $createdFocalPerson = $createdFocalPerson->toArray();
        $this->assertArrayHasKey('id', $createdFocalPerson);
        $this->assertNotNull($createdFocalPerson['id'], 'Created FocalPerson must have id specified');
        $this->assertNotNull(FocalPerson::find($createdFocalPerson['id']), 'FocalPerson with given id must be in DB');
        $this->assertModelData($focalPerson, $createdFocalPerson);
    }

    /**
     * @test read
     */
    public function test_read_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();

        $dbFocalPerson = $this->focalPersonRepo->find($focalPerson->id);

        $dbFocalPerson = $dbFocalPerson->toArray();
        $this->assertModelData($focalPerson->toArray(), $dbFocalPerson);
    }

    /**
     * @test update
     */
    public function test_update_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();
        $fakeFocalPerson = factory(FocalPerson::class)->make()->toArray();

        $updatedFocalPerson = $this->focalPersonRepo->update($fakeFocalPerson, $focalPerson->id);

        $this->assertModelData($fakeFocalPerson, $updatedFocalPerson->toArray());
        $dbFocalPerson = $this->focalPersonRepo->find($focalPerson->id);
        $this->assertModelData($fakeFocalPerson, $dbFocalPerson->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_focal_person()
    {
        $focalPerson = factory(FocalPerson::class)->create();

        $resp = $this->focalPersonRepo->delete($focalPerson->id);

        $this->assertTrue($resp);
        $this->assertNull(FocalPerson::find($focalPerson->id), 'FocalPerson should not exist in DB');
    }
}
