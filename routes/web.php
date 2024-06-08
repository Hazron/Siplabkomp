<?php

use App\Http\Controllers\Superadmin\DashboardSuperController;
use App\Http\Controllers\Superadmin\TabelmahasiswaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//MAHASISWA CONTROLLER
use App\Http\Controllers\Mahasiswa\MahasiswaController;

//ADMIN CONTROLLER
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\detailuserController;
use App\Http\Controllers\Admin\pengambilanKunci;
use App\Http\Controllers\Admin\RiwayatPinjamController;
use App\Http\Controllers\Admin\tabeluserController;
use App\Http\Controllers\mahasiswa\AjukanController;


use App\Http\Controllers\Superadmin\jadwalController;
use App\Http\Controllers\Superadmin\tahunAkademikController;

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('/dashboardadmin', [adminController::class, 'show'])->name('show');
    Route::get('/pengambilankunci', [pengambilanKunci::class, 'index'])->name('index');
    Route::get('/riwayatpinjam', [RiwayatPinjamController::class, 'show'])->name('show');
    Route::get('/alluser', [TabeluserController::class, 'mahasiswaIndex'])->name('alluser.index');
    Route::get('alluser/detailuser', [detailuserController::class, 'view'])->name('view');
    Route::post('/pengambilan-kunci/verifikasi', [pengambilanKunci::class, 'verifikasiKodePinjam'])->name('kodepinjam');
    Route::post('/selesaikan-peminjaman/{id_riwayat}', [pengambilanKunci::class, 'selesaikanPeminjaman'])->name('selesaikan');
});

//MAHASISWA
Route::middleware(['auth', 'MahasiswaMiddleware'])->group(function () {
    Route::get('/dashboarduser', [MahasiswaController::class, 'view']);
    Route::get('/ajukan/peminjaman', [AjukanController::class, 'view'])->name('view');
    Route::post('/ajukan/peminjamannn', [AjukanController::class, 'ajukanPinjam'])->name('ajukan.peminjaman');
});

// SUPERADMIN
Route::middleware(['auth', 'SuperadminMiddleware'])->group(function () {
    Route::get('/dashboardsuper', [DashboardSuperController::class, 'view'])->name('view');

    Route::get('/tabel_mhs', [TabelmahasiswaController::class, 'view'])->name('tabel_mhs.index');
    Route::get('/tabel_mhs/create', [TabelmahasiswaController::class, 'create'])->name('tabel_mhs.create');
    Route::post('/tabel_mhs', [TabelmahasiswaController::class, 'store'])->name('tabel_mhs.store');
    Route::post('/mahasiswa/import', [TabelMahasiswaController::class, 'import'])->name('mahasiswa.import');


    Route::get('/tahunakademik', [tahunAkademikController::class, 'index'])->name('index');
    Route::post('/tahun-akademik', [tahunAkademikController::class, 'store'])->name('tahun_akademik.store');

    Route::get('/jadwal', [jadwalController::class, 'index'])->name('jadwal.index');
    Route::post('/jadwal/import', [jadwalController::class, 'import'])->name('jadwal.import');
    Route::get('/jadwal/{id}/edit', [jadwalController::class, 'edit']);
    Route::put('/jadwal/{id}', [jadwalController::class, 'update'])->name('jadwal.update');
});

//HOMEPAGE
Route::get('/index', [HomeController::class, 'index']);

//USER
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified',])->name('dashboard');


require __DIR__ . '/auth.php';



//ADMIN

//MAHASISWA
