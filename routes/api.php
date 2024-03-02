<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('mahasiswas', App\Http\Controllers\API\MahasiswaAPIController::class)
    ->except(['create', 'edit']);

Route::resource('mata-kuliahs', App\Http\Controllers\API\MataKuliahAPIController::class)
    ->except(['create', 'edit']);

Route::resource('khs', App\Http\Controllers\API\KhsAPIController::class)
    ->except(['create', 'edit']);