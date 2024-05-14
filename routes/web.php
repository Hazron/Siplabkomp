<?php
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

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::middleware(['auth', 'AdminMiddleware'])->group(function() {
    Route::get('/dashboardadmin', [adminController::class, 'view'])->name('view');
    Route::get('/pengambilankunci', [pengambilanKunci::class, 'index'])->name('index');
    Route::get('/riwayatpinjam', [RiwayatPinjamController::class, 'view'])->name('view');
    Route::get('/alluser', [TabeluserController::class, 'mahasiswaIndex'])->name('alluser.index');
    Route::get('alluser/detailuser', [detailuserController::class, 'view'])->name('view');
});

//MAHASISWA
Route::middleware(['auth', 'MahasiswaMiddleware'])->group(function(){
    Route::get('/dashboarduser', [MahasiswaController::class, 'view']);
    Route::get('/ajukan/peminjaman',[AjukanController::class, 'view'])->name('view');
});

//SUPERADMIN

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


require __DIR__.'/auth.php';



//ADMIN

//MAHASISWA
