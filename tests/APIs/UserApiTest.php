<?php namespace Tests\APIs;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;


    public function assertModelData(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, [
                'created_at',
                'updated_at',
                'email_verified_at',
                'password'
            ])) {
                continue;
            }
            $this->assertEquals($actualData[$key], $expectedData[$key]);
        }
    }

    /**
     * @test
     */
    public function test_create_user()
    {

     $user = factory(User::class)->make()->makeVisible(['password'])->toArray();


        $this->response = $this->json(
            'POST',
            '/api/v1/users', $user
        );

        $this->assertApiResponse($user);
    }


}
