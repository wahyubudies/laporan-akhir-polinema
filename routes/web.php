<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FormPendaftaranController;
use App\Http\Controllers\JudulDiterimaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PenilaianLaporanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\DataLogbookController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\RefrensiTemaController;
use App\Http\Controllers\RekapLaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::middleware(['auth'])->group(function(){    
  Route::resource('persyaratan', PersyaratanController::class);
  Route::get('pengumuman/{id}/download', [PengumumanController::class, 'download'])->name('pengumuman.download');
  Route::resource('pengumuman', PengumumanController::class);  
  Route::resource('dosen', DosenController::class);
  Route::resource('refrensi-tema', RefrensiTemaController::class);
  Route::get('form-pendaftaran/export', [FormPendaftaranController::class, 'fileExport'])->name('form-pendaftaran.export');

  Route::get('pendaftaran/create', [FormPendaftaranController::class, 'create'])->name('form-pendaftaran.create');
  Route::get('form-pendaftaran', [FormPendaftaranController::class, 'guest'])->name('form-pendaftaran.guest');
  Route::get('form-pendaftaran/{id}', [FormPendaftaranController::class, 'detail'])->name('form-pendaftaran.detail');  
  Route::post('form-pendaftaran', [FormPendaftaranController::class, 'store'])->name('form-pendaftaran.store');
  Route::resource('form-pendaftaran', FormPendaftaranController::class)->except(['create','store']);

  Route::get('rekap-laporan/insert-link', [RekapLaporanController::class, 'insertLink'])->name('rekap-laporan.insertLink');
  Route::put('rekap-laporan/store-link', [RekapLaporanController::class, 'storeLink'])->name('rekap-laporan.store-link');
  Route::get('rekap-laporan/excel', [RekapLaporanController::class, 'exportExcel'])->name('rekap-laporan.export');
  Route::resource('rekap-laporan', RekapLaporanController::class);

  Route::get('penilaian-laporan/excel', [PenilaianLaporanController::class, 'exportExcel'])->name('penilaian-laporan.export');
  Route::resource('penilaian-laporan', PenilaianLaporanController::class);  
  
  Route::post('logbook/store-narasi/{id}', [LogbookController::class, 'storeNarasi'])->name('logbook.store-narasi');
  Route::delete('logbook/delete-narasi/{id}', [LogbookController::class, 'deleteNarasi'])->name('logbook.delete-narasi');
  Route::get('qrcode-generator', [DataLogbookController::class, 'qrcodeGenerator'])->name('qrcode-generator');
  Route::post('qrcode-generator', [DataLogbookController::class, 'qrcodeGeneratorStore'])->name('qrcode-generator.store');
  Route::get('qrcode-generator/download/{id}', [DataLogbookController::class, 'qrcodeGeneratorDownlaod'])->name('qrcode-generator.download');
  Route::get('logbook/list-logbook', [DataLogbookController::class, 'listLogbook'])->middleware('pembimbing')->name('list.logbook');
  Route::get('logbok/logbook-excel/{id}', [LogbookController::class, 'exportExcel'])->name('logbook.export');
  Route::get('logbook/data-logbook-excel', [DataLogbookController::class, 'exportExcel'])->name('data-logbook.export');
  Route::put('logbook/generate-code-dospem1/{id}', [DataLogbookController::class, 'generateQrCode1'])->name('data-logbook.code1');
  Route::put('logbook/generate-code-dospem2/{id}', [DataLogbookController::class, 'generateQrCode2'])->name('data-logbook.code2');    
  Route::resource('logbook', DataLogbookController::class);  
  Route::get('/logout', function() {
      Auth::logout();
      return redirect()->route('login');
  });
});