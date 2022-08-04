<?php namespace Tests\APIs;


use App\Models\SafeguardConcern;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Illuminate\Http\UploadedFile;

class RolesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;



    public function test_get_roles() {
        $this->response = $this->json('GET', '/api/v1/roles');
        $response = json_decode($this->response->getContent(), true);
        $roles = $response['data']['data'];
//        dd($roles);

        $expectedKeys = [
            'id',
            'name',
            'permissions'
        ];
        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $roles[0]);
        }

        $this->assertEquals(4, $response['data']['meta']['total']);

    }
}
