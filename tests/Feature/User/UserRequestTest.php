<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testAllFieldsEmpty(): void
    {
        $invalidRequestData = [
            'login' => '',
            'password' => '',
        ];
        $fieldErrorMessage = [
            'login' => 'The login field is required.',
            'password' => [
                'The password field must be a string.',
                'The password field must be at least 5 characters.',
                'The password field format is invalid.',
            ],
        ];

        $response = $this->post('api/store', $invalidRequestData);

        $response->assertInvalid($fieldErrorMessage);
        $this->assertDatabaseCount(User::class, 0);
    }

    public function testMoreThanFields(): void
    {
        $invalidRequestData = [
            'login' => Str::repeat('n', 10000000),
            'password' => Str::repeat('n', 10000000),
        ];
        $fieldErrorMessage = [
            'login' => 'The login field must not be greater than 255 characters.',
            'password' => 'The password field must not be greater than 255 characters.',
        ];

        $response = $this->post('api/store', $invalidRequestData);

        $response->assertInvalid($fieldErrorMessage);
        $this->assertDatabaseCount(User::class, 0);
    }

    public function testLessThanFields(): void
    {
        $invalidRequestData = [
            'login' => 'n',
            'password' => 'nnnn',
        ];
        $fieldErrorMessage = [
            'login' => 'The login field must be at least 2 characters.',
            'password' => 'The password field must be at least 5 characters.',
        ];

        $response = $this->post('api/store', $invalidRequestData);

        $response->assertInvalid($fieldErrorMessage);
        $this->assertDatabaseCount(User::class, 0);
    }

}
