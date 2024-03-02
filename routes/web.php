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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('mahasiswas', App\Http\Controllers\MahasiswaController::class);
Route::resource('mataKuliahs', App\Http\Controllers\MataKuliahController::class);
Route::get('khs/ubah/{nim}/{kode}', 'App\Http\Controllers\KhsController@edit');
Route::delete('khs/hapus/{nim}/{kode}', 'App\Http\Controllers\KhsController@destroy');
Route::patch('khs/update/{nim}/{kode}', 'App\Http\Controllers\KhsController@update');
Route::resource('khs', App\Http\Controllers\KhsController::class);