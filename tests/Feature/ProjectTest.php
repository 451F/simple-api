<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    private $projectStructure = [
        'id',
        'name',
        'description',
        'status',
    ];

    public function testProjectIndex(): void
    {
        $response = $this->getJson('/api/project');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [$this->projectStructure]]);
    }

    public function testProjectShow(): void
    {
        $response = $this->getJson('/api/project/1');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => $this->projectStructure]);
    }

    public function testProjectShow404(): void
    {
        $response = $this->getJson('/api/project/1010');

        $response->assertStatus(404);
    }

    public function testProjectStore(): void
    {
        $response = $this->postJson('/api/project', factory(Project::class)->make()->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => $this->projectStructure]);

    }


    public function testProjectUpdate(): void
    {
        $response = $this->patchJson('/api/project/1', factory(Project::class)->make()->toArray());

        $response->assertStatus(202)
            ->assertJsonStructure(['data' => $this->projectStructure]);

    }
}
