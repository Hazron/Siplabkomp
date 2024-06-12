<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testLogin()
{
    $response = $this->post('/login', [
        'email' => 'hazron2003redian@gmail.com',
        'password' => 'R0052021',
    ]);

    $response->assertStatus(302); // Memastikan berhasil redirect setelah login
    $this->assertAuthenticated(); // Memastikan user sudah terotentikasi
}

}
