<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieManagementTest extends TestCase
{
    /**
     * @test
     */
    public function index_view_can_be_retrieved()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('index');
    }
    /**
     * @test
     */
    public function show_view_can_be_retrieved()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/movie');

        $response->assertStatus(200);
        $response->assertViewIs('show');
    }
}
