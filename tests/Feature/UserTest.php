<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * Correctly authenticated
     *
     * @return void
     */
    public function testAuthorizeSuccessfully(): void
    {
        $data = [
            'name' => 'admin',
            'password' => 'admin',
        ];

        $this->json('POST', '/authorize', $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'token'
            ]);
    }

    /**
     * Invalid name or password
     *
     */
    public function testAuthorizeFailure(): void
    {
        $data = [
            'name' => '',
            'password' => '',
        ];

        $this->json('POST', '/authorize', $data)
            ->assertStatus(400)
            ->assertExactJson([
                'error' => "invalid_credentials",
            ]);
    }
}
