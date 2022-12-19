<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PaginateController;
use App\Http\Controllers\Api\ProvinceController;
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

Route::get('/data-kelurahan', [PaginateController::class, 'get_wards']);
Route::resource('/data-provinsi',  ProvinceController::class);
Route::resource('/data-kota',  CityController::class);