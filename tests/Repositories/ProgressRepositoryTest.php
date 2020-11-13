<?php namespace Tests\Repositories;

use App\Models\Progress;
use App\Repositories\ProgressRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProgressRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgressRepository
     */
    protected $progressRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->progressRepo = \App::make(ProgressRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_progress()
    {
        $progress = factory(Progress::class)->make()->toArray();

        $createdProgress = $this->progressRepo->create($progress);

        $createdProgress = $createdProgress->toArray();
        $this->assertArrayHasKey('id', $createdProgress);
        $this->assertNotNull($createdProgress['id'], 'Created Progress must have id specified');
        $this->assertNotNull(Progress::find($createdProgress['id']), 'Progress with given id must be in DB');
        $this->assertModelData($progress, $createdProgress);
    }

    /**
     * @test read
     */
    public function test_read_progress()
    {
        $progress = factory(Progress::class)->create();

        $dbProgress = $this->progressRepo->find($progress->id);

        $dbProgress = $dbProgress->toArray();
        $this->assertModelData($progress->toArray(), $dbProgress);
    }

    /**
     * @test update
     */
    public function test_update_progress()
    {
        $progress = factory(Progress::class)->create();
        $fakeProgress = factory(Progress::class)->make()->toArray();

        $updatedProgress = $this->progressRepo->update($fakeProgress, $progress->id);

        $this->assertModelData($fakeProgress, $updatedProgress->toArray());
        $dbProgress = $this->progressRepo->find($progress->id);
        $this->assertModelData($fakeProgress, $dbProgress->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_progress()
    {
        $progress = factory(Progress::class)->create();

        $resp = $this->progressRepo->delete($progress->id);

        $this->assertTrue($resp);
        $this->assertNull(Progress::find($progress->id), 'Progress should not exist in DB');
    }
}
