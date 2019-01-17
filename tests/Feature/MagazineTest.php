<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class MagazineTest extends TestCase
{
    /**
     * @return void
     */
    public function testMagazinesSearch(): void
    {
        $this->json('GET', sprintf('/magazines/search?name=MyMagazine&publisher_id=1&token=%s', $this->getAuthorizeToken()))
            ->assertStatus(200)
            ->assertJsonStructure([
                "current_page",
                "data" => [[
                    "id",
                    "name",
                ]],
                "first_page_url",
                "from",
                "last_page",
                "last_page_url",
                "next_page_url",
                "path",
                "per_page",
                "prev_page_url",
                "to",
                "total",
            ]);
    }

    /**
     * @return void
     */
    public function testMagazinesSearchWithHeadersToken(): void
    {
        $this->json('GET', '/magazines/search?name=MyMagazine&publisher_id=1', [], $this->getAuthorizeHeaders())
            ->assertStatus(200)
            ->assertJsonStructure([
                "current_page",
                "data" => [[
                    "id",
                    "name",
                ]],
                "first_page_url",
                "from",
                "last_page",
                "last_page_url",
                "next_page_url",
                "path",
                "per_page",
                "prev_page_url",
                "to",
                "total",
            ]);
    }

    /**
     * @return void
     */
    public function testMagazinesSearchWithoutToken(): void
    {
        $this->json('GET', '/magazines/search')
            ->assertStatus(200)
            ->assertExactJson([
                'status' => "Authorization Token not found",
            ]);
    }

    /**
     * @return void
     */
    public function testMagazinesShow(): void
    {
        $this->json('GET', sprintf('/magazines/1?token=%s', $this->getAuthorizeToken()))
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'publisher_id',
                'created_at',
                'updated_at',
                'publisher' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * @return void
     */
    public function testMagazinesShowWithHeadersToken(): void
    {
        $this->json('GET', '/magazines/1', [], $this->getAuthorizeHeaders())
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'publisher_id',
                'created_at',
                'updated_at',
                'publisher' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * @return void
     */
    public function testMagazinesShowWithoutToken(): void
    {
        $this->json('GET', '/magazines/1')
            ->assertStatus(200)
            ->assertExactJson([
                'status' => "Authorization Token not found",
            ]);
    }

    /**
     * @return string
     */
    private function getAuthorizeToken(): string
    {
        return \JWTAuth::fromUser(User::find(1));
    }

    /**
     * @return array
     */
    private function getAuthorizeHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->getAuthorizeToken(),
        ];
    }
}
