<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\DaftarHibahController;
use App\Http\Controllers\GenerateFileController;


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
Route::any('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('isMWC');

Route::get('/home', [LembagaController::class, 'index'])->name('home')->middleware('isMWC');
Route::post('/lembaga', [LembagaController::class, 'addDataLembaga'])->name('lembaga')->middleware('isMWC');

Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan')->middleware('isMWC');
Route::post('/addpimpinan', [PimpinanController::class, 'addDataPimpinan'])->name('addpimpinan')->middleware('isMWC');

Route::get('/operator', [OperatorController::class, 'index'])->name('operator')->middleware('isMWC');
Route::post('/addoperator', [OperatorController::class, 'AdddataOperator'])->name('addoperator')->middleware('isMWC');

Route::get('/persyaratan', [PersyaratanController::class, 'index'])->name('persyaratan')->middleware('isMWC');
Route::any('/addPersyaratan', [PersyaratanController::class, 'addPersyaratan'])->name('addPersyaratan')->middleware('isMWC');
Route::put('/updatePersyaratan/{id_persyaratan}', [PersyaratanController::class, 'editPersyaratan'])->name('editPersyaratan')->middleware('isMWC');
Route::get('/deletePersyaratan/{id_persyaratan}', [PersyaratanController::class, 'deletePersyaratan'])->name('deletePersyaratan')->middleware('isMWC');

Route::get('/daftarhibah', [DaftarHibahController::class, 'index'])->name('daftarHibah')->middleware('isMWC');
Route::get('/detailHibah', [DaftarHibahController::class, 'detailHibah'])->name('detailhibah')->middleware('isMWC');
Route::post('/addDataBank', [DaftarHibahController::class, 'AddDataBank'])->name('addDataBank');
Route::post('/addDataProposal', [DaftarHibahController::class, 'addProposal'])->name('addProposal');

Route::get('/generateFile', [GenerateFileController::class, 'index'])->name('generateFile')->middleware('isMWC');


