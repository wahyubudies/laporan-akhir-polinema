<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\RefrensiTemaController;
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
  return redirect()->route('login');
});

Auth::routes();
Route::middleware(['auth'])->group(function(){
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::middleware(['admin'])->group(function(){
    // Routing pengumuman
    Route::get('pengumuman/{id}/download', [PengumumanController::class, 'download'])->name('pengumuman.download');
    Route::resource('pengumuman', PengumumanController::class);

    // Routing persyaratan
    Route::resource('persyaratan', PersyaratanController::class);

    //Routing Dosen
    Route::resource('dosen', DosenController::class);

    //Routing Refrensi Tema
    Route::get('refrensi-tema/search', [RefrensiTemaController::class, 'search'])->name('refrensi-tema.search');
    Route::resource('refrensi-tema', RefrensiTemaController::class);  
  });

  Route::middleware(['dosen'])->group(function(){
    
  });
  Route::get('logout', function(){
    Auth::logout();
    return redirect()->route('login');
  });
});