<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Masters\{
    CompanyController,
    DepartmentController,
    LetterTypeController,
    LetterStatusController,
};
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

Route::resource('/mtd-login', LoginController::class);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('authcheck')->group(function() {
    Route::get('/', function () {
        return view('index');
    });
    
    // Route untuk Master
    Route::resource('/master/perusahaan', CompanyController::class);
    Route::resource('/master/bagian', DepartmentController::class);
    Route::resource('/master/status-surat', LetterStatusController::class);
    Route::resource('/master/jenis-surat', LetterTypeController::class);
});
