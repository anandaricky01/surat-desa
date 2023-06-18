<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    // route log out
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // route dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // route pengantar ktp
    Route::get('/pengantar-ktp', [SuratController::class, 'pengantar_ktp'])->name('pengantar_ktp');
    Route::get('/pengantar-ktp/{id}', [SuratController::class, 'detail_pengantar_ktp'])->name('detail_pengantar_ktp');
    Route::post('/kirim-pengantar-ktp', [SuratController::class, 'kirim_pengantar_ktp'])->name('kirim_pengantar_ktp');

    // route sktm
    Route::get('/sktm', [SuratController::class, 'sktm'])->name('sktm');
    Route::get('/sktm/{id}', [SuratController::class, 'detail_sktm'])->name('detail_sktm');
    Route::post('/kirim-sktm', [SuratController::class, 'kirim_sktm'])->name('kirim_sktm');

    // route sktm
    Route::get('/surat-kematian', [SuratController::class, 'surat_kematian'])->name('surat_kematian');
    Route::get('/surat-kematian/{id}', [SuratController::class, 'detail_surat_kematian'])->name('detail_surat_kematian');
    Route::post('/kirim-surat-kematian', [SuratController::class, 'kirim_surat_kematian'])->name('kirim_surat_kematian');

    // Halaman status request
    Route::get('/status-request', [SuratController::class, 'status_request'])->name('status_request');
    Route::get('/permohonan-surat-masuk', [SuratController::class, 'permohonan_surat_masuk'])->name('permohonan_surat_masuk');

    // route biodata
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::get('/biodata/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::post('/biodata/edit', [BiodataController::class, 'update'])->name('biodata.update');

    Route::resource('user', UserController::class)
        ->name('index', 'user.index')
        ->name('create', 'user.create')
        ->name('store', 'user.store')
        ->name('show', 'user.show')
        ->name('edit', 'user.edit')
        ->name('update', 'user.update')
        ->name('destroy', 'user.delete');
});
