<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\FormPendaftaranController;
use App\Http\Controllers\FormUploadController;
use App\Http\Controllers\JudulDiterimaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PenilaianLaporanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\RefrensiTemaController;
use App\Http\Controllers\RekapJudulController;
use App\Http\Controllers\RekapLaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
//Routing Auth
Route::get('/', function(){    
  return view('auth.login');
});


Auth::routes();
Route::middleware('auth')->group(function(){
  //Route Guest Pengumuman
  Route::get('pengumuman/{id}/download', [PengumumanController::class, 'download'])->name('pengumuman.download');  
  //Route Export Form Pendaftaran
  Route::get('form-pendaftaran/export', [FormPendaftaranController::class, 'fileExport'])->name('form-pendaftaran.export');
  //Route Export Rekap Laporan
  Route::get('rekap-laporan/excel', [RekapLaporanController::class, 'exportExcel'])->name('rekap-laporan.export');
  //Route Export Penilaian Laporan
  Route::get('penilaian-laporan/excel', [PenilaianLaporanController::class, 'exportExcel'])->name('penilaian-laporan.export');
});
Route::middleware(['admin','pembimbing'])->group(function(){
    // Routing pengumuman    
    Route::resource('admin/pengumuman', PengumumanController::class);
    Route::resource('pembimbing/pengumuman', PengumumanController::class);
  
    // Routing persyaratan
    Route::resource('admin/persyaratan', PersyaratanController::class);
    Route::resource('pembimbing/persyaratan', PersyaratanController::class);
  
    //Routing Dosen
    Route::resource('admin/dosen', DosenController::class);
    Route::resource('pembimbing/dosen', DosenController::class);
  
    //Routing Refrensi Tema  
    Route::resource('admin/refrensi-tema', RefrensiTemaController::class);
    Route::resource('pembimbing/refrensi-tema', RefrensiTemaController::class);
  
    // Routing Judul Diterima
    Route::resource('admin/judul-diterima', JudulDiterimaController::class);
    Route::resource('pembimbing/judul-diterima', JudulDiterimaController::class);
  
    //Routing Rekap Judul
    Route::resource('admin/rekap-judul', RekapJudulController::class);
    Route::resource('pembimbing/rekap-judul', RekapJudulController::class);
  
    // Routing Form Pendaftaran
    Route::resource('admin/form-pendaftaran', FormPendaftaranController::class)->except(['create','store']);  
    Route::resource('pembimbing/form-pendaftaran', FormPendaftaranController::class)->except(['create','store']);  
  
    // Routing Rekap Laporan
    Route::resource('admin/rekap-laporan', RekapLaporanController::class);
    Route::resource('pembimbing/rekap-laporan', RekapLaporanController::class);
  
    // Routing Penilaian Laporan
    Route::resource('admin/penilaian-laporan', PenilaianLaporanController::class);
    Route::resource('pembimbing/penilaian-laporan', PenilaianLaporanController::class);
  }
);

Route::group(['prefix' => 'mahasiswa', 'middleware' => 'mahasiswa'], function(){  

  //Route Guest Persyaratan
  Route::get('persyaratan', [PersyaratanController::class, 'guest'])->name('persyaratan.guest');  
  Route::get('pengumuman', [PengumumanController::class, 'guest'])->name('pengumuman.guest');
  //Route Refrensi Tema
  Route::get('refrensi-tema', [RefrensiTemaController::class, 'guest'])->name('refrensi-tema.guest');
  //Route Guest Dosen
  Route::get('dosen', [DosenController::class, 'guest'])->name('dosen.guest');
  //Route Guest Form Pendaftaran
  Route::get('form-pendaftaran/create', [FormPendaftaranController::class, 'create'])->name('form-pendaftaran.create');
  Route::get('form-pendaftaran', [FormPendaftaranController::class, 'guest'])->name('form-pendaftaran.guest');
  Route::get('form-pendaftaran/{id}', [FormPendaftaranController::class, 'detail'])->name('form-pendaftaran.detail');  
  Route::post('form-pendaftaran', [FormPendaftaranController::class, 'store'])->name('form-pendaftaran.store');
  //Route Guest Judul Diterima
  Route::get('judul-diterima', [JudulDiterimaController::class, 'guest'])->name('judul-diterima.guest');
  //Route Guest Rekap Judul
  Route::get('rekap-judul', [RekapJudulController::class, 'guest'])->name('rekap-judul.guest');
  Route::get('rekap-judul/{id}', [RekapJudulController::class, 'detail'])->name('rekap-judul.detail');
  //Route Guest Rekap Laporan
  Route::get('rekap-laporan', [RekapLaporanController::class, 'guest'])->name('rekap-laporan.guest');
  Route::get('rekap-laporan/insert-link', [RekapLaporanController::class, 'insertLink'])->name('rekap-laporan.insertLink');
  Route::put('rekap-laporan/store-link', [RekapLaporanController::class, 'storeLink'])->name('rekap-laporan.store-link');
  //Route Guest Oenilaian Laporan
  Route::get('penilaian-laporan', [PenilaianLaporanController::class, 'guest'])->name('penilaian-laporan.guest');
});