<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\DaftarHibahController;


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

Route::any('/', [LoginController::class, 'login'])->name('login');
Route::any('/register', [LoginController::class, 'register'])->name('register');

Route::get('/home', [LembagaController::class, 'index'])->name('home');
Route::post('/lembaga', [PimpinanController::class, 'addDataLembaga'])->name('lembaga');

Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan');
Route::post('/addpimpinan', [PimpinanController::class, 'AddDataPimpinan'])->name('addpimpinan');

Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
Route::post('/addoperator', [OperatorController::class, 'AdddataOperator'])->name('addoperator');

Route::get('/persyaratan', [PersyaratanController::class, 'index'])->name('persyaratan');
Route::any('/addPersyaratan', [PersyaratanController::class, 'addPersyaratan'])->name('addPersyaratan');

Route::get('/daftarhibah', [DaftarHibahController::class, 'index'])->name('daftarHibah');
