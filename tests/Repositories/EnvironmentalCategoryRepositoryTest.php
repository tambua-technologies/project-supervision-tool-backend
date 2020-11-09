<?php namespace Tests\Repositories;

use App\Models\EnvironmentalCategory;
use App\Repositories\EnvironmentalCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnvironmentalCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnvironmentalCategoryRepository
     */
    protected $environmentalCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->environmentalCategoryRepo = \App::make(EnvironmentalCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->make()->toArray();

        $createdEnvironmentalCategory = $this->environmentalCategoryRepo->create($environmentalCategory);

        $createdEnvironmentalCategory = $createdEnvironmentalCategory->toArray();
        $this->assertArrayHasKey('id', $createdEnvironmentalCategory);
        $this->assertNotNull($createdEnvironmentalCategory['id'], 'Created EnvironmentalCategory must have id specified');
        $this->assertNotNull(EnvironmentalCategory::find($createdEnvironmentalCategory['id']), 'EnvironmentalCategory with given id must be in DB');
        $this->assertModelData($environmentalCategory, $createdEnvironmentalCategory);
    }

    /**
     * @test read
     */
    public function test_read_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();

        $dbEnvironmentalCategory = $this->environmentalCategoryRepo->find($environmentalCategory->id);

        $dbEnvironmentalCategory = $dbEnvironmentalCategory->toArray();
        $this->assertModelData($environmentalCategory->toArray(), $dbEnvironmentalCategory);
    }

    /**
     * @test update
     */
    public function test_update_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();
        $fakeEnvironmentalCategory = factory(EnvironmentalCategory::class)->make()->toArray();

        $updatedEnvironmentalCategory = $this->environmentalCategoryRepo->update($fakeEnvironmentalCategory, $environmentalCategory->id);

        $this->assertModelData($fakeEnvironmentalCategory, $updatedEnvironmentalCategory->toArray());
        $dbEnvironmentalCategory = $this->environmentalCategoryRepo->find($environmentalCategory->id);
        $this->assertModelData($fakeEnvironmentalCategory, $dbEnvironmentalCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_environmental_category()
    {
        $environmentalCategory = factory(EnvironmentalCategory::class)->create();

        $resp = $this->environmentalCategoryRepo->delete($environmentalCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(EnvironmentalCategory::find($environmentalCategory->id), 'EnvironmentalCategory should not exist in DB');
    }
}
