<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiCategoryPostMethodTest extends TestCase
{
    /**
     * A basic feature test post.
     *
     * @return void
     */
    public function test_post()
    {
        $response = $this->json('/api/category', ['name' => 'TestCategory']);
        $response = $this->json('/api/category', ['description' => 'TestDesc']);
        $response = $this->json('/api/category', ['image' => 'public/categories/vuYd7kP7buBgqkMqQhP6lqSqEQlx3ukdLcuAHlAF.jpg']);
        

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => 'true',
            ]);
    }
}
