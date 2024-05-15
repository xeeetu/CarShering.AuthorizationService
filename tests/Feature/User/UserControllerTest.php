<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanStore(): void
    {
        $requestData = [
            'login' => 'user_test',
            'password' => '123456j',
        ];

        $response = $this->post('api/store', $requestData);

        $response->assertSuccessful();
        $this->assertDatabaseCount(User::class, 1);
        $this->assertDatabaseHas(User::class, ['login' => 'user_test']);
    }

}
