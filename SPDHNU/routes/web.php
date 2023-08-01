<?php

use App\Http\Controllers\RabKegiatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\DaftarHibahController;
use App\Http\Controllers\GenerateFileController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RabController;

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
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [LembagaController::class, 'index'])->name('home')->middleware('isMWC');
Route::post('/lembaga', [LembagaController::class, 'addDataLembaga'])->name('lembaga')->middleware('isMWC');

Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan')->middleware('isMWC');
Route::post('/addpimpinan', [PimpinanController::class, 'addDataPimpinan'])->name('addpimpinan')->middleware('isMWC');

Route::get('/operator', [OperatorController::class, 'index'])->name('operator')->middleware('isMWC');
Route::post('/addoperator', [OperatorController::class, 'AdddataOperator'])->name('addoperator')->middleware('isMWC');

Route::get('/persyaratan', [PersyaratanController::class, 'index'])->name('persyaratan')->middleware('isMWC');
Route::post('/addPersyaratan', [PersyaratanController::class, 'addPersyaratan'])->name('addPersyaratan')->middleware('isMWC');
Route::get('/getPersyaratan', [PersyaratanController::class, 'getPersyaratan'],)->name('getPersyaratan')->middleware('isMWC');
Route::get('/deletePersyaratan/{id_persyaratan}', [PersyaratanController::class, 'deletePersyaratan'],)->name('deletePersyaratan')->middleware('isMWC');

Route::get('/daftarhibah', [DaftarHibahController::class, 'index'])->name('daftarHibah');
Route::get('/detailProposal', [DaftarHibahController::class, 'detailProposal'])->name('detailProposal');
Route::post('/addProposal', [DaftarHibahController::class, 'addProposal'])->name('addProposal');
Route::post('/addDanaHibah', [DaftarHibahController::class, 'addDanaHibah'])->name('addDanaHibah');
Route::get('/deleteProposal/{id_proposal}', [DaftarHibahController::class, 'deleteProposal'])->name('deleteProposal')->middleware('isMWC');
Route::get('/detailHibah', [DaftarHibahController::class, 'detailHibah'])->name('detailhibah')->middleware('isMWC');

Route::post('/addDataBank', [BankController::class, 'AddDataBank'])->name('addDataBank')->middleware('isMWC');
Route::get('/bank/{id_proposal}', [BankController::class, 'index'])->name('bank');

// Route::post('/addDataProposal', [ProposalController::class, 'addProposal'])->name('addProposal');
Route::get('/proposal/{id_proposal}', [ProposalController::class, 'index'])->name('proposal');

Route::get('/rab/{id_kegiatan}', [RabController::class, 'index'])->name('dataRab');
Route::get('/rab-detail', [RabController::class, 'getRabDetail'])->name('rab-detail');
Route::post('/rab-add/{id_kegiatan}', [RabController::class, 'addRab'])->name('rab-add')->middleware('isMWC');
Route::get('/rab-del/{id_rab}', [RabController::class, 'deletePersyaratan'])->name('rab-del')->middleware('isMWC');

Route::get('/rab-kegiatan/{id}', [RabKegiatanController::class, 'index'])->name('rabKegiatan');
Route::post('/add-kegiatan', [RabKegiatanController::class, 'addRabKegiatan'])->name('addRabKegiatan')->middleware('isMWC');
Route::get('/edit-kegiatan', [RabKegiatanController::class, 'getRabKegiatan'])->name('getRabKegiatan')->middleware('isMWC');
Route::get('/rab-kegiatan-del/{id}', [RabKegiatanController::class, 'deleteKegiatan'])->name('deleteKegiatan')->middleware('isMWC');

Route::prefix('report')->group(function () {
  Route::get('/index', [GenerateFileController::class, 'index'])->name('generateFile')->middleware('isMWC');
  Route::get('/permohonan-pencairan', [GenerateFileController::class, 'suratPencairan'])->name('permohonan-pencairan');
  Route::get('/fakta_integritas', [GenerateFileController::class, 'faktaIntegritas'])->name('fakta_integritas');
  Route::get('/naskah_perjanjian/{proposal_id}', [GenerateFileController::class, 'naskahPerjanjian'])->name('naskah_perjanjian');
  Route::get('/surat_pernyataan', [GenerateFileController::class, 'suratPernyataan'])->name('surat_pernyataan');
  Route::get('/surat_keabsahan', [GenerateFileController::class, 'suratKeabsahan'])->name('surat_keabsahan');
  Route::get('/rincian_rab/{id}', [GenerateFileController::class, 'rincianRAB'])->name('rincian_rab');
});

