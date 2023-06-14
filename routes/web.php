<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    // Place all your routes here
    Route::resource('/pengembalians', \App\Http\Controllers\PengembalianController::class);
    Route::resource('/peminjamans', \App\Http\Controllers\PeminjamanController::class);
    Route::resource('/stocks', \App\Http\Controllers\StockController::class);
    Route::resource('/vendors', \App\Http\Controllers\VendorController::class);
    Route::resource('/users', UserController::class)->only('create', 'destroy', 'index', 'store');
    Route::resource('/divisions', DivisiController::class)->only('create', 'destroy', 'index', 'store');
    Route::resource('/roles', RoleController::class)->only('create', 'destroy', 'index', 'store');
    Route::resource('/laporans', LaporanController::class)->only('create', 'destroy', 'index', 'store');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();

