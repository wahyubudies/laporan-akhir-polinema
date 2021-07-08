<?php

use App\Http\Controllers\DosenController;
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
  return redirect()->route('persyaratan.guest');
});
//Route Form
Route::get('form', [FormUploadController::class, 'create'])->name('form.create');
Route::post('form', [FormUploadController::class, 'store'])->name('form.store');

//Route Guest Persyaratan
Route::get('persyaratan/guest', [PersyaratanController::class, 'guest'])->name('persyaratan.guest');
//Route Guest Pengumuman
Route::get('pengumuman/{id}/download', [PengumumanController::class, 'download'])->name('pengumuman.download');
Route::get('pengumuman/guest', [PengumumanController::class, 'guest'])->name('pengumuman.guest');
//Route Guest Dosen
Route::get('dosen/guest', [DosenController::class, 'guest'])->name('dosen.guest');
//Route Guest Refrensi Tema
Route::get('refrensi-tema/guest', [RefrensiTemaController::class, 'guest'])->name('refrensi-tema.guest');
//Route Guest Judul Diterima
Route::get('judul-diterima/guest', [JudulDiterimaController::class, 'guest'])->name('judul-diterima.guest');
//Route Guest Rekap Judul
Route::get('rekap-judul/guest', [RekapJudulController::class, 'guest'])->name('rekap-judul.guest');
Route::get('rekap-judul/{id}', [RekapJudulController::class, 'detail'])->name('rekap-judul.detail');

Auth::routes();
Route::middleware(['auth'])->group(function(){  
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
});