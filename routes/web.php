<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PresensiController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dasbhoard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/ubah', [UserController::class, 'profile_ubah'])->name('profile_ubah');
    Route::post('profile/update/guru/{id}', [UserController::class, 'profile_update_guru']);
    Route::post('profile/update/siswa/{id}', [UserController::class, 'profile_update_siswa']);

    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/guru/tambah', [GuruController::class, 'create']);
    Route::post('/guru/store', [GuruController::class, 'store']);
    Route::get('/guru/ubah/{id}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id}', [GuruController::class, 'update']);
    Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [SiswaController::class, 'create']);
    Route::post('/siswa/store', [SiswaController::class, 'store']);
    Route::get('/siswa/ubah/{id}', [SiswaController::class, 'edit']);
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);
    Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy']);

    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/tambah', [KelasController::class, 'create']);
    Route::post('/kelas/store', [KelasController::class, 'store']);
    Route::get('/kelas/ubah/{id}', [KelasController::class, 'edit']);
    Route::post('/kelas/update/{id}', [KelasController::class, 'update']);
    Route::get('/kelas/hapus/{id}', [KelasController::class, 'destroy']);

    Route::get('/mapel', [MapelController::class, 'index']);
    Route::get('/mapel/tambah', [MapelController::class, 'create']);
    Route::post('/mapel/store', [MapelController::class, 'store']);
    Route::get('/mapel/ubah/{id}', [MapelController::class, 'edit']);
    Route::post('/mapel/update/{id}', [MapelController::class, 'update']);
    Route::get('/mapel/hapus/{id}', [MapelController::class, 'destroy']);

    Route::get('/jadwal/tambah', [JadwalController::class, 'create']);
    Route::post('/jadwal/store', [JadwalController::class, 'store']);
    Route::get('/jadwal/ubah/{id}', [JadwalController::class, 'edit']);
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update']);
    Route::get('/jadwal/hapus/{id}', [JadwalController::class, 'destroy']);

    Route::get('/qrcode/{id}', [JadwalController::class, 'qrcode']);
    Route::get('/presensi/siswa/{id}', [PresensiController::class, 'presensi_siswa']);
    Route::get('/presensi/siswa/{id}/tambah', [PresensiController::class, 'presensi_siswa_tambah']);
    Route::post('/presensi/siswa/{id}/store', [PresensiController::class, 'presensi_siswa_store']);
    Route::get('/presensi/siswa/{jadwal_id}/hapus/{id}', [PresensiController::class, 'presensi_siswa_hapus']);

});

Route::post('/presensi/{code}', [PresensiController::class, 'presensi']);
Route::get('/daftar_absensi', [HomeController::class, 'daftar_absensi'])->name('daftar_absensi');
Route::get('/laporan_siswa', [HomeController::class, 'laporan_siswa'])->name('laporan_siswa');
Route::get('/laporan_detail', [HomeController::class, 'laporan_detail'])->name('laporan_detail');

