<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NhaTro\NhaTroController;
use App\Http\Controllers\PhongTro\PhongTroController;
use App\Http\Controllers\Tang\TangController;
use App\Http\Controllers\ThongTinNguoiThue\ThongTinNguoiThueController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/themmoinhatro', [NhaTroController::class, 'create'])->name('nhatro.create');
Route::post('/postthemmoinhatro', [NhaTroController::class, 'store'])->name('nhatro.create.post');

// Route::get('/nhatro/{id}', [AdminController::class, 'index']);
// Route::get('/phongtro', [PhongTroController::class, 'index']);
Route::middleware('fetch.nhatro')->prefix('nhatro/{id}')->group(function () {
    Route::get('/', [NhaTroController::class, 'show'])->name('nhatro.show');

    Route::prefix('tang')->group(function () {
        Route::get('/', [TangController::class, 'index'])->name('nhatro.tang.show');
        Route::get('/themtang', [TangController::class, 'create'])->name('nhatro.themtang');
        Route::post('/themtang', [TangController::class, 'store'])->name('nhatro.storetang');
        Route::get('/suatang/{id_tang}', [TangController::class, 'edit'])->name('nhatro.suatang.get');
        Route::post('/suatang/{id_tang}', [TangController::class, 'update'])->name('nhatro.suatang.post');
        Route::get('/xoatang/{id_tang}', [TangController::class, 'destroy'])->name('nhatro.xoatang');
    });

    Route::prefix('phong')->group(function () {
        Route::get('/', [PhongTroController::class, 'index'])->name('nhatro.phong.show');
        Route::get('/thongtinphong/{id_phong}', [PhongTroController::class, 'info'])->name('nhatro.phong.show.info');
        Route::get('/themphong', [PhongTroController::class, 'create'])->name('phongtro.themphong');
        Route::post('/themphong', [PhongTroController::class, 'store'])->name('phongtro.storephong');
        Route::get('/suaphong/{id_phong}', [PhongTroController::class, 'edit'])->name('phongtro.suaphong.get');
        Route::post('/suaphong/{id_phong}', [PhongTroController::class, 'update'])->name('phongtro.suaphong.post');
        Route::get('/xoaphong/{id_phong}', [PhongTroController::class, 'destroy'])->name('phongtro.xoaphong');

        Route::prefix('/{id_phong}/nguoithue')->group(function () {
            Route::get('/', [ThongTinNguoiThueController::class, 'index'])->name('nhatro.phong.nguoithue.show.all.info');
            Route::get('/all', [ThongTinNguoiThueController::class, 'infoall'])->name('phong.nguoithue.danhsach.all');
            Route::get('/thongtin/{id_nguoithue}', [ThongTinNguoiThueController::class, 'info'])->name('nhatro.phong.nguoithue.show.1.info');
            Route::get('/themnguoi', [ThongTinNguoiThueController::class, 'create'])->name('phongtro.nguoithue.themnguoi');
            Route::post('/themnguoi', [ThongTinNguoiThueController::class, 'store'])->name('phongtro.nguoithue.storenguoi');
            Route::get('/suanguoithue/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'edit'])->name('nguoitro.suanguoi.get');
            Route::post('/suanguoithue/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'update'])->name('nguoitro.suanguoi.post');
            Route::get('/xoanguoi/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'destroy'])->name('nguoitro.xoanguoi');
        });
    });
    


    // Định nghĩa URL để hiển thị chi tiết phòng trọ
    // Route::get('/phongtro', [AdminController::class, 'show'])->name('phongtro.show.all');
    // Route::get('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.create');
    // Route::post('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.store');
    // Route::get('/phongtro/{roomId}', [AdminController::class, 'show'])->name('nhatro.phongtro.show');
});