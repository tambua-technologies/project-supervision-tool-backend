<?php namespace Tests\Repositories;

use App\Models\Borrower;
use App\Repositories\BorrowerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BorrowerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BorrowerRepository
     */
    protected $borrowerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->borrowerRepo = \App::make(BorrowerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_borrower()
    {
        $borrower = factory(Borrower::class)->make()->toArray();

        $createdBorrower = $this->borrowerRepo->create($borrower);

        $createdBorrower = $createdBorrower->toArray();
        $this->assertArrayHasKey('id', $createdBorrower);
        $this->assertNotNull($createdBorrower['id'], 'Created Borrower must have id specified');
        $this->assertNotNull(Borrower::find($createdBorrower['id']), 'Borrower with given id must be in DB');
        $this->assertModelData($borrower, $createdBorrower);
    }

    /**
     * @test read
     */
    public function test_read_borrower()
    {
        $borrower = factory(Borrower::class)->create();

        $dbBorrower = $this->borrowerRepo->find($borrower->id);

        $dbBorrower = $dbBorrower->toArray();
        $this->assertModelData($borrower->toArray(), $dbBorrower);
    }

    /**
     * @test update
     */
    public function test_update_borrower()
    {
        $borrower = factory(Borrower::class)->create();
        $fakeBorrower = factory(Borrower::class)->make()->toArray();

        $updatedBorrower = $this->borrowerRepo->update($fakeBorrower, $borrower->id);

        $this->assertModelData($fakeBorrower, $updatedBorrower->toArray());
        $dbBorrower = $this->borrowerRepo->find($borrower->id);
        $this->assertModelData($fakeBorrower, $dbBorrower->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_borrower()
    {
        $borrower = factory(Borrower::class)->create();

        $resp = $this->borrowerRepo->delete($borrower->id);

        $this->assertTrue($resp);
        $this->assertNull(Borrower::find($borrower->id), 'Borrower should not exist in DB');
    }
}
