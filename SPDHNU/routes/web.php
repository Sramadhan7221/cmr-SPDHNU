<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LembagaController;

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
Route::any('/lembaga', [LembagaController::class, 'addDataLembaga'])->name('lembaga');
Route::any('/pimpinan', [LembagaController::class, 'addDataPimpinan'])->name('pimpinan');
