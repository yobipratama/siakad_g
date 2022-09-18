<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NilaiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_nilai()
    {
        $response = $this->get('/mahasiswa/nilai/$nim');

        $response->assertStatus(500);
        $response->assertSee('prodi');
    }
}
