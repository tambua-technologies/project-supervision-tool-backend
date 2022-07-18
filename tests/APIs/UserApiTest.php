<?php namespace Tests\APIs;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Faker\Factory as Faker;

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
                'password',
                'procuring_entity_id'
            ])) {
                continue;
            }
            $this->assertEquals($actualData[$key], $expectedData[$key]);
        }
    }

    public function assertApiResponse(Array $actualData)
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data'];



        $procuringEntity = $responseData['procuringEntity'];

        $this->assertNotEmpty($responseData['id']);
        $this->assertNotEmpty($responseData['roles']);
        $this->assertNotEmpty($procuringEntity['agency']);
        $this->assertNotEmpty($procuringEntity['project']);
        $this->assertModelData($actualData, $responseData);


    }

    /**
     * @test
     */
    public function test_create_user()
    {

        $faker = Faker::create();

     $user = [
         'title' => $faker->title,
         'phone' => $faker->unique()->phoneNumber,
         'email' => $faker->unique()->safeEmail,
         'first_name' => $faker->firstName,
         'last_name' => $faker->lastName,
         'middle_name' => $faker->firstName,
         'procuring_entity_id' => 3,
         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
     ];


        $this->response = $this->json(
            'POST',
            '/api/v1/users', $user
        );

        $this->assertApiResponse($user);
    }

    public function test_login_user()
    {
        $loginPayload = ['email' => 'testing@project-supervision-tool.com', 'password' => 'Pass@Tool'];
        $expectedUser = [];

        $this->response = $this->json(
            'POST',
            '/api/v1/focal_people/login', $loginPayload
        );


        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data']['user'];



        $procuringEntity = $responseData['procuringEntity'];

        $this->assertNotEmpty($responseData['id']);
        $this->assertNotEmpty($responseData['roles']);
        $this->assertNotEmpty($procuringEntity['agency']);
        $this->assertNotEmpty($procuringEntity['project']);

    }


}
