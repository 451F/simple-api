<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{
    private $clientStructure = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function testClientIndex(): void
    {
        $response = $this->getJson('/api/client');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [$this->clientStructure]]);
    }

    public function testClientShow(): void
    {
        $response = $this->getJson('/api/client/1');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => $this->clientStructure]);
    }

    public function testClientShow404(): void
    {
        $response = $this->getJson('/api/client/1010');

        $response->assertStatus(404);
    }

    public function testClientStore(): void
    {
        $response = $this->postJson('/api/client', factory(Client::class)->make()->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => $this->clientStructure]);

    }


    public function testClientUpdate(): void
    {
        $response = $this->patchJson('/api/client/1', factory(Client::class)->make()->toArray());

        $response->assertStatus(202)
            ->assertJsonStructure(['data' => $this->clientStructure]);

    }
}
