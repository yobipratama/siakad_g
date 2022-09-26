<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KhsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_khs()
    {
        $response = $this->get('/mahasiswa/nilai/$nim/pdf');

        $response->assertStatus(200);

        $response->assertSeeText('Mata-Kuliah');
    }
}
