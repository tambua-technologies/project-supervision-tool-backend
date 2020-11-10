<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Borrower;

class BorrowerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_borrower()
    {
        $borrower = factory(Borrower::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/borrowers', $borrower
        );

        $this->assertApiResponse($borrower);
    }

    /**
     * @test
     */
    public function test_read_borrower()
    {
        $borrower = factory(Borrower::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/borrowers/'.$borrower->id
        );

        $this->assertApiResponse($borrower->toArray());
    }

    /**
     * @test
     */
    public function test_update_borrower()
    {
        $borrower = factory(Borrower::class)->create();
        $editedBorrower = factory(Borrower::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/borrowers/'.$borrower->id,
            $editedBorrower
        );

        $this->assertApiResponse($editedBorrower);
    }

    /**
     * @test
     */
    public function test_delete_borrower()
    {
        $borrower = factory(Borrower::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/borrowers/'.$borrower->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/borrowers/'.$borrower->id
        );

        $this->response->assertStatus(404);
    }
}
