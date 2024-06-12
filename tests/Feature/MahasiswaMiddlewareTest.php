<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Http\Middleware\MahasiswaMiddleware;
use App\Models\User;

class MahasiswaMiddlewareTest extends TestCase
{
    // Gunakan trait DatabaseTransactions untuk menangani transaksi database
    use DatabaseTransactions;

    public function testMahasiswaCanAccessWithMiddleware()
    {
        // Dapatkan user nyata dengan tipe 'mahasiswa' dari database
        $user = User::where('usertype', 'mahasiswa')->first();
        
        // Pastikan user dengan tipe 'mahasiswa' tersedia
        $this->assertNotNull($user, 'User mahasiswa tidak ditemukan di database.');

        // Meniru (mock) sebagai user tersebut
        $this->actingAs($user);

        // Buat request dan instance dari middleware
        $request = Request::create('/some-url', 'GET');
        $middleware = new MahasiswaMiddleware();

        // Panggil method handle pada middleware dan teruskan closure yang mengembalikan response 'OK'
        $response = $middleware->handle($request, function ($req) {
            return response('OK');
        });

        // Lakukan assertion untuk memastikan bahwa response adalah sesuai yang diharapkan
        $this->assertEquals('OK', $response->getContent(), 'Middleware tidak memberikan response yang benar.');
    }

}