<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Routing pengumuman
Route::get('pengumuman/{id}/download', 'PengumumanController@download')->name('pengumuman.download');
Route::resource('pengumuman', PengumumanController::class);

// Routing persyaratan
Route::resource('persyaratan', PersyaratanController::class);

//Routing Dosen
Route::resource('dosen', DosenController::class);

//Routing Refrensi Tema
Route::resource('refrensi-tema', RefrensiTemaController::class);