<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DetailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_detail()
    {
        $response = $this->get('/mahasiswa/$nim');

        $response->assertStatus(500);

        $response->assertSeeText('Foto');
    }
}
