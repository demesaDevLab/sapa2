
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\GuruAdminController;
use App\Http\Controllers\WakasekController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GuruPemantauController;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD SISWA
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'siswa'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])
    ->middleware('auth')
    ->name('profil');


/*
|--------------------------------------------------------------------------
| PENGADUAN SISWA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/pengaduan/buat', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');

    Route::get('/pengaduan/riwayat', [PengaduanController::class, 'riwayat'])
        ->name('pengaduan.riwayat');

    Route::get('/pengaduan/{id}', [PengaduanController::class, 'detail'])
        ->name('pengaduan.detail');

    Route::get('/pengaduan/{id}/sukses', [PengaduanController::class, 'success'])
        ->name('pengaduan.success');

});


/*
|--------------------------------------------------------------------------
| GURU / ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru_admin'])->group(function () {

    // Dashboard Guru/Admin
    Route::get('/guru-admin/dashboard', [GuruAdminController::class, 'dashboard'])
        ->name('guru_admin.dashboard');

    // Detail Pengaduan
    Route::get('/guru-admin/pengaduan/{id}', [GuruAdminController::class, 'detail'])
        ->name('guru_admin.pengaduan.detail');

    // Terima / Proses Pengaduan
    Route::post('/guru-admin/pengaduan/{id}/proses', [GuruAdminController::class, 'proses'])
        ->name('guru_admin.pengaduan.proses');

    // Memberikan Tanggapan
    Route::post('/guru-admin/pengaduan/{id}/tanggapan', [GuruAdminController::class, 'tanggapan'])
        ->name('guru_admin.pengaduan.tanggapan');

    // Tolak Pengaduan
    Route::post('/guru-admin/pengaduan/{id}/tolak', [GuruAdminController::class, 'tolak'])
        ->name('guru_admin.pengaduan.tolak');

    // Menyelesaikan Pengaduan
    Route::post('/guru-admin/pengaduan/{id}/selesai', [GuruAdminController::class, 'selesai'])
        ->name('guru_admin.pengaduan.selesai');

});

/*
|--------------------------------------------------------------------------
| WAKASEK
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'role:wakasek'])->group(function () {

    // Dashboard Wakasek
    Route::get('/wakasek/dashboard', [WakasekController::class, 'dashboard'])
        ->name('wakasek.dashboard');

    // Detail Pengaduan
    Route::get('/wakasek/pengaduan/{id}', [WakasekController::class, 'detail'])
        ->name('wakasek.pengaduan.detail');

    // Terima / Proses Pengaduan
    Route::post('/wakasek/pengaduan/{id}/proses', [WakasekController::class, 'proses'])
        ->name('wakasek.pengaduan.proses');

    // Tolak Pengaduan
    Route::post('/wakasek/pengaduan/{id}/tolak', [WakasekController::class, 'tolak'])
        ->name('wakasek.pengaduan.tolak');

    // Selesaikan Pengaduan
    Route::post('/wakasek/pengaduan/{id}/selesai', [WakasekController::class, 'selesai'])
        ->name('wakasek.pengaduan.selesai');

});

/*
|--------------------------------------------------------------------------
| KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get(
    '/kepala-sekolah/dashboard',
    [KepalaSekolahController::class, 'dashboard']
)
    ->middleware('auth')
    ->name('kepala_sekolah.dashboard');

// Detail Pengaduan
Route::get(
    '/kepala-sekolah/pengaduan/{id}',
    [KepalaSekolahController::class, 'detail']
)
    ->middleware('auth')
    ->name('kepala_sekolah.pengaduan.detail');


/*
|--------------------------------------------------------------------------
| DATA MASTER - KHUSUS GURU / ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru_admin'])->group(function () {

    // DATA KATEGORI
    Route::get('/data-master/kategori', [KategoriController::class, 'index'])
        ->name('kategori.index');

    Route::post('/data-master/kategori', [KategoriController::class, 'store'])
        ->name('kategori.store');

    Route::put('/data-master/kategori/{id}', [KategoriController::class, 'update'])
        ->name('kategori.update');

    Route::delete('/data-master/kategori/{id}', [KategoriController::class, 'destroy'])
        ->name('kategori.destroy');


    // DATA STATUS
    Route::get('/data-master/status', [StatusController::class, 'index'])
        ->name('status.index');

    Route::post('/data-master/status', [StatusController::class, 'store'])
        ->name('status.store');

    Route::put('/data-master/status/{id}', [StatusController::class, 'update'])
        ->name('status.update');

    Route::delete('/data-master/status/{id}', [StatusController::class, 'destroy'])
        ->name('status.destroy');


    // DATA PENGGUNA
    Route::get('/data-master/pengguna', [PenggunaController::class, 'index'])
        ->name('pengguna.index');

    Route::post('/data-master/pengguna', [PenggunaController::class, 'store'])
        ->name('pengguna.store');

    Route::put('/data-master/pengguna/{id}', [PenggunaController::class, 'update'])
        ->name('pengguna.update');

    Route::delete('/data-master/pengguna/{id}', [PenggunaController::class, 'destroy'])
        ->name('pengguna.destroy');

});


/*
|--------------------------------------------------------------------------
| TEST EMAIL
|--------------------------------------------------------------------------
*/

Route::get('/test-email', function () {

    try {

        Mail::raw('Ini adalah email percobaan dari aplikasi SAPA.', function ($message) {
            $message->to('test@example.com')
                    ->subject('Pengujian Email SAPA');
        });

        return 'Email berhasil dikirim!';

    } catch (\Throwable $e) {

        return 'Error: ' . $e->getMessage()
            . '<br>File: ' . $e->getFile()
            . '<br>Baris: ' . $e->getLine();

    }

});


/*
|--------------------------------------------------------------------------
| GURU PEMANTAU
|--------------------------------------------------------------------------
*/

// Dashboard Guru Pemantau
Route::get('/guru-pemantau/dashboard', [GuruPemantauController::class, 'dashboard'])
    ->middleware('auth')
    ->name('guru_pemantau.dashboard');

// Daftar Pengaduan
Route::get('/guru-pemantau/pengaduan', [GuruPemantauController::class, 'pengaduan'])
    ->middleware('auth')
    ->name('guru_pemantau.pengaduan');

// Detail Pengaduan
Route::get('/guru-pemantau/pengaduan/{id}', [GuruPemantauController::class, 'detail'])
    ->middleware('auth')
    ->name('guru_pemantau.pengaduan.detail');
