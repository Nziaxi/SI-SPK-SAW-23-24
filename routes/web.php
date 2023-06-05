<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerangkinganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])->name('auth.login');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/perangkingan', [PerangkinganController::class, 'index'])->name('templates.perangkingan')->middleware(['auth', 'verified']);
Route::get('/perangkingan/print', [PerangkinganController::class, 'print'])->name('templates.perangkingan-print')->middleware(['auth', 'verified']);
Route::get('/report', [ReportController::class, 'index'])->name('templates.report')->middleware(['auth', 'verified']);

// Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
// Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
// Route::post('/divisi', [DivisiController::class, 'store'])->name('divisi.store');
// Route::get('/divisi/{id}/edit', [DivisiController::class, 'edit'])->name('divisi.edit');
// Route::put('/divisi/{id}', [DivisiController::class, 'update'])->name('divisi.update');
// Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');
Route::resource('divisi', DivisiController::class)->middleware(['auth', 'verified']);

// Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
// Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
// Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
// Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
// Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
// Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::get('/karyawan/print', [KaryawanController::class, 'print'])->name('karyawan.print')->middleware(['auth', 'verified']);
Route::resource('karyawan', KaryawanController::class)->middleware(['auth', 'verified']);

Route::get('riwayat-penilaian', [HistoryController::class, 'index'])->name('riwayat-penilaian.index')->middleware(['auth', 'verified']);
Route::get('riwayat-penilaian/create', [HistoryController::class, 'create'])->name('riwayat-penilaian.create')->middleware(['auth', 'verified']);
Route::post('riwayat-penilaian', [HistoryController::class, 'store'])->name('riwayat-penilaian.store')->middleware(['auth', 'verified']);
Route::get('riwayat-penilaian/{id}/{year}/edit', [HistoryController::class, 'edit'])->name('riwayat-penilaian.edit')->middleware(['auth', 'verified']);
Route::put('riwayat-penilaian/{id}/{year}', [HistoryController::class, 'update'])->name('riwayat-penilaian.update')->middleware(['auth', 'verified']);
Route::delete('riwayat-penilaian/{id}', [HistoryController::class, 'destroy'])->name('riwayat-penilaian.destroy')->middleware(['auth', 'verified']);
Route::get('riwayat-penilaian/{year}', [HistoryController::class, 'print'])->name('riwayat-penilaian.print')->middleware(['auth', 'verified']);

// Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
// Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
// Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
// Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
// Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
// Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
Route::get('/pengguna/print', [PenggunaController::class, 'print'])->name('pengguna.print')->middleware(['auth', 'verified']);
Route::resource('pengguna', PenggunaController::class)->middleware(['auth', 'verified']);

// Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
// Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
// Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
// Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
// Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
// Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
Route::resource('kriteria', KriteriaController::class)->middleware(['auth', 'verified']);

// Route::get('/bobot', [BobotController::class, 'index'])->name('bobot.index');
// Route::get('/bobot/create', [BobotController::class, 'create'])->name('bobot.create');
// Route::post('/bobot', [BobotController::class, 'store'])->name('bobot.store');
// Route::get('/bobot/{id}/edit', [BobotController::class, 'edit'])->name('bobot.edit');
// Route::put('/bobot/{id}', [BobotController::class, 'update'])->name('bobot.update');
// Route::delete('/bobot/{id}', [BobotController::class, 'destroy'])->name('bobot.destroy');
Route::resource('bobot', BobotController::class)->middleware(['auth', 'verified']);

// Route::get('/sub-kriteria', [SubKriteriaController::class, 'index'])->name('sub-kriteria.index');
// Route::get('/sub-kriteria/create', [SubKriteriaController::class, 'create'])->name('sub-kriteria.create');
// Route::post('/sub-kriteria', [SubKriteriaController::class, 'store'])->name('sub-kriteria.store');
// Route::get('/sub-kriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('sub-kriteria.edit');
// Route::put('/sub-kriteria/{id}', [SubKriteriaController::class, 'update'])->name('sub-kriteria.update');
// Route::delete('/sub-kriteria/{id}', [SubKriteriaController::class, 'destroy'])->name('sub-kriteria.destroy');
Route::resource('sub-kriteria', SubKriteriaController::class)->middleware(['auth', 'verified']);

// Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
// Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
// Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
// Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
// Route::put('/penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
// Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
Route::get('/penilaian/print', [PenilaianController::class, 'print'])->name('penilaian.print')->middleware(['auth', 'verified']);
Route::resource('penilaian', PenilaianController::class)->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';