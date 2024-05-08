<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pengambilanKunci;
use App\Http\Controllers\RiwayatPinjamController;

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::middleware('auth')->group(function() {
    Route::get('/pengambilankunci', [pengambilanKunci::class, 'index'])->name('index');
    Route::get('/riwayatpinjam', [RiwayatPinjamController::class, 'view'])->name('view');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//USER
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//HOMEPAGE
Route::get('/index', [HomeController::class, 'index']);
