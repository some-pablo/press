<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublisherTest extends TestCase
{
    /**
     * @return void
     */
    public function testList(): void
    {
        $authorizeData = [
            'name' => 'admin',
            'password' => 'admin',
        ];

        $data = json_decode($this->json('POST', '/authorize', $authorizeData)->getContent(), true);

        $this->json('GET', sprintf('/publishers/list?token=%s', $data['token']))
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'name'
                ]
            ]);
    }

    /**
     * @return void
     */
    public function testListWithoutToken(): void
    {
        $this->json('GET', 'publishers/list')
            ->assertStatus(200)
            ->assertExactJson([
                'status' => "Authorization Token not found",
            ]);
    }

}
