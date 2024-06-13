<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;
use App\Models\User;
use App\Imports\MahasiswaImport;

class SuperadminTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuperadminCanAddTahunAkademik()
    {
        $user = User::factory()->create(['usertype' => 'superadmin']);
        $this->actingAs($user);

        $data = [
            'tahun_akademik' => 'Genap 2024/2025',
            'jadwal_akademik' => '2024-09-01',
            'status' => 'Active',
        ];

        $response = $this->post('/tahun-akademik', $data);
        $response->assertRedirect();

        $this->assertDatabaseHas('tahunakademik', [
            'tahun_akademik' => $data['tahun_akademik'],
            'jadwal_akademik' => $data['jadwal_akademik'],
            'status' => $data['status'],
        ]);
    }

    public function testSuperadminCanImportMahasiswa()
    {
        $user = User::factory()->create(['usertype' => 'superadmin']);
        $this->actingAs($user);

        Storage::fake('local');

        $filePath = public_path('excel/Tahun Akademik Genap 23-24.xlsx');
        $uploadedFile = new UploadedFile(
            $filePath,
            'Tahun Akademik Genap 23-24.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        Excel::fake();

        $response = $this->post('/mahasiswa/import', [
            'file' => $uploadedFile,
            'tahunakademik' => 'Genap 2023/2024',
        ]);

        $response->assertStatus(200);

        Excel::assertImported('Tahun Akademik Genap 23-24.xlsx', function (MahasiswaImport $import) {
            return $import->tahunAkademik === 'Genap 2023/2024';
        });

        $this->assertDatabaseHas('users', [
            'tahunakademik' => 'Genap 2023/2024',
        ]);
    }
}
