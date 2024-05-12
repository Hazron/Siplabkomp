<?php
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;


use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\pengambilanKunci;
use App\Http\Controllers\RiwayatPinjamController;
use App\Http\Controllers\tabeluserController;

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::middleware(['auth', 'AdminMiddleware'])->group(function() {
    Route::get('/dashboardadmin', [adminController::class, 'view'])->name('view');
    Route::get('/pengambilankunci', [pengambilanKunci::class, 'index'])->name('index');
    Route::get('/riwayatpinjam', [RiwayatPinjamController::class, 'view'])->name('view');
    Route::get('/alluser', [tabeluserController::class, 'view'])->name('view');
});

//MAHASISWA
Route::middleware(['auth', 'MahasiswaMiddleware'])->group(function(){
    Route::get('/dashboarduser', [MahasiswaController::class, 'view']);
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


require __DIR__.'/auth.php';



//ADMIN

//MAHASISWA
