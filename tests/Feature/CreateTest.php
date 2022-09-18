<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->get('/mahasiswa/create');

        $response->assertStatus(500);

        $response->assertSeeText('Prodi');
    }
}
