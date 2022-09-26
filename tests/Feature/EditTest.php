<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_edit()
    {
        //setup

        //do something
        $response = $this->get('/mahasiswa/$nim/edit');

        //assert
        $response->assertStatus(200);
        $response->assertSeeText('Kelas');
    }
}
