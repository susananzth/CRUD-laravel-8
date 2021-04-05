<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Probar el metodo store de PostController.
     *
     * @return void
     */
    public function test_store()
    {
        $response = $this->json('POST', '/api/posts', [
            "title" => "El post de test"
        ]);

        $response->assertJsonStructure(["id", "title", "created_at","updated_at"])
            ->assertJson(["title" => "El post de test"])
            ->assertStatus(201);
        
        $this->assertDatabaseHas("posts", ["title" => "El post de test"]);
    }
}