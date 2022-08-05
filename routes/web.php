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
//  fhfj
Route::get('/admin', [\App\Http\Controllers\UserController::class,'login']);
Route::post('/authenticate', [\App\Http\Controllers\UserController::class,'authenticate']);

Route::prefix('user')->group(function () {
    Route::get('/',[\App\Http\Controllers\UserController::class,'index']);

    Route::get('/create',[\App\Http\Controllers\UserController::class,'create']);

    Route::post('/store',[\App\Http\Controllers\UserController::class,'store']);

    Route::get('/{uid}/edit',[\App\Http\Controllers\UserController::class,'edit']);

    Route::put('/{uid}/',[\App\Http\Controllers\UserController::class,'edit']);

});
