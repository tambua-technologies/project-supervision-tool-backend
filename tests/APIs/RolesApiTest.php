<?php namespace Tests\APIs;


use App\Models\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RolesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;



    public function test_get_roles() {
        $this->response = $this->json('GET', '/api/v1/roles');
        $response = json_decode($this->response->getContent(), true);
        $roles = $response['data']['data'];

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

    public function test_delete_role()
    {
        $user = User::create([
            'first_name' => 'example',
            'last_name' => 'user',
            'phone' => '0654549880',
            'email' => 'user@example.com',
            'title' => 'sub project coordinator',
            'password' => bcrypt('password@1'),
        ]);
        $user->assignRole('admin');
        $this->assertEquals(1, $user->roles()->count());
        $this->response = $this->json('DELETE', '/api/v1/roles/1');
        $user->refresh();
        $this->assertEquals(0, $user->roles()->count());

    }


}
