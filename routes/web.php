<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;
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
