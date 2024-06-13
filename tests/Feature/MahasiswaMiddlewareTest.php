<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class MahasiswaMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    // Middleware Tests

    public function testAdminCanAccessWithMiddleware()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $response = $this->get('/dashboardadmin');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    public function testMahasiswaCanAccessWithMiddleware()
    {
        $user = User::factory()->create(['usertype' => 'mahasiswa']);
        $this->actingAs($user);

        $response = $this->get('/dashboarduser');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    public function testSuperadminCanAccessWithMiddleware()
    {
        $user = User::factory()->create(['usertype' => 'superadmin']);
        $this->actingAs($user);

        $response = $this->get('/dashboardsuper');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    // Functional Route Tests for Admin

    public function testAdminCanAccessPengambilanKunci()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $response = $this->get('/pengambilankunci');
        $response->assertStatus(200);
    }

    public function testAdminCanAccessRiwayatPinjam()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $response = $this->get('/riwayatpinjam');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    public function testAdminCanAccessAllJadwal()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $response = $this->get('/alljadwal');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    // Functional Route Tests for Mahasiswa

    public function testMahasiswaCanAccessAjukanPeminjaman()
    {
        $user = User::factory()->create(['usertype' => 'mahasiswa']);
        $this->actingAs($user);

        $response = $this->get('/ajukan/peminjaman');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    public function testMahasiswaCanPostAjukanPeminjaman()
    {
        $user = User::factory()->create(['usertype' => 'mahasiswa']);
        $this->actingAs($user);

        $response = $this->post('/ajukan/peminjamannn', [
            // Sertakan data yang diperlukan untuk pengajuan peminjaman
        ]);
        $response->assertStatus(302); // Mengharapkan redirect setelah post berhasil
    }

    // Functional Route Tests for Superadmin

    public function testSuperadminCanAccessTabelMahasiswa()
    {
        $user = User::factory()->create(['usertype' => 'superadmin']);
        $this->actingAs($user);

        $response = $this->get('/tabel_mhs');
        $response->assertStatus(200); // Pastikan URL ini benar dan tersedia
    }

    public function testSuperadminCanImportMahasiswa()
    {
        $user = User::factory()->create(['usertype' => 'superadmin']);
        $this->actingAs($user);

        $response = $this->post('/mahasiswa/import', [
            // Sertakan data yang diperlukan untuk import
        ]);
        $response->assertStatus(302); // Mengharapkan redirect setelah import berhasil
    }
}
