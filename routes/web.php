<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\FormPendaftaranController;
use App\Http\Controllers\FormUploadController;
use App\Http\Controllers\JudulDiterimaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\RefrensiTemaController;
use App\Http\Controllers\RekapJudulController;
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
});
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
  // Routing pengumuman    
  Route::resource('pengumuman', PengumumanController::class);

  // Routing persyaratan
  Route::resource('persyaratan', PersyaratanController::class);

  //Routing Dosen
  Route::resource('dosen', DosenController::class);

  //Routing Refrensi Tema
  Route::get('refrensi-tema/search', [RefrensiTemaController::class, 'search'])->name('refrensi-tema.search');
  Route::resource('refrensi-tema', RefrensiTemaController::class);      

  // Routing Judul Diterima
  Route::resource('judul-diterima', JudulDiterimaController::class);

  //Routing Rekap Judul
  Route::resource('rekap-judul', RekapJudulController::class);

  // Routing Form Pendaftaran
  Route::resource('form-pendaftaran', FormPendaftaranController::class)->except(['create','store']);  
});

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
});