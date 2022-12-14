<?php

use App\Http\Controllers\Masters\{
    ChestController,
    CityController,
    CompanyController,
    CountryController,
    DepartmentController,
    DepartmentGroupController,
    DistrictController,
    LetterClassificationController,
    LetterOriginController,
    LetterStatusController,
    LetterTypeController,
    PositionController,
    ProvinceController,
    ReligionController,
    RetentionController,
    SaveMethodController,
    ShelfController,
    StorageTimeController,
    WardController,
};
use App\Http\Controllers\Settings\{
    AccountController,
    FileController,
    LoginController,
    ProviderController,
    UserController,
};
use App\Http\Controllers\Transactions\{
    DeletedMailController,
    IncomingMailController,
    MonitoringMailController,
    OutgoingMailController,
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
    Route::resource('/master/lemari', ChestController::class);
    Route::resource('/master/kota', CityController::class);
    Route::resource('/master/perusahaan', CompanyController::class);
    Route::resource('/master/negara', CountryController::class);
    Route::resource('/master/departemen', DepartmentController::class);
    Route::resource('/master/kecamatan', DistrictController::class);
    Route::resource('/master/kelompok-departemen', DepartmentGroupController::class);
    Route::resource('/master/klasifikasi-surat', LetterClassificationController::class);
    Route::resource('/master/asal-surat', LetterOriginController::class);
    Route::resource('/master/status-surat', LetterStatusController::class);
    Route::resource('/master/jenis-surat', LetterTypeController::class);
    Route::resource('/master/jabatan', PositionController::class);
    Route::resource('/master/provinsi', ProvinceController::class);
    Route::resource('/master/agama', ReligionController::class);
    Route::resource('/master/retensi', RetentionController::class);
    Route::resource('/master/metode-simpan', SaveMethodController::class);
    Route::resource('/master/rak', ShelfController::class);
    Route::resource('/master/lokasi-simpan', StorageTimeController::class);
    Route::resource('/master/kelurahan', WardController::class);

    // Route untuk Setting
    Route::resource('/pengaturan/akun-login', AccountController::class);
    Route::resource('/pengaturan/pengguna', UserController::class);
    Route::resource('/pengaturan/provider', ProviderController::class);

    // Route untuk Manajemen Surat
    Route::resource('/manajemen/surat-masuk', IncomingMailController::class);
    Route::resource('/manajemen/surat-keluar', OutgoingMailController::class);
    Route::resource('/manajemen/monitoring-surat', MonitoringMailController::class);
    Route::resource('/manajemen/sampah-surat', DeletedMailController::class);

    // Route untuk AJAX
    Route::get('/master/get-perusahaan/', [CompanyController::class, 'get_company'])->name('company.getCompany');

    // Route untuk Download atau Upload
    Route::get('/download', [FileController::class, 'download']);
});
