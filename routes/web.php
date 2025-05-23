<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnhXe\AnhXeController;
use App\Http\Controllers\ChiPhiDichVu\ChiPhiDichVuController;
use App\Http\Controllers\HoaDonPhongTro\HoaDonPhongTroController;
use App\Http\Controllers\NhaTro\NhaTroController;
use App\Http\Controllers\PhongTro\PhongTroController;
use App\Http\Controllers\SoDienNuocTheoPhong\SoDienNuocTheoPhongController;
use App\Http\Controllers\Tang\TangController;
use App\Http\Controllers\ThongTinNguoiThue\ThongTinNguoiThueController;
use App\Models\SoDienNuocTheoPhong;
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
Route::get('/suatennhatro/{id}', [NhaTroController::class, 'edit'])->name('nhatro.edit');
Route::post('/postsuatennhatro/{id}', [NhaTroController::class, 'update'])->name('nhatro.edit.post');
// Route::get('/test/{id_phongtro}', [AdminController::class, 'test']);
Route::get('/test', [AdminController::class, 'test']);

// Route::get('/nhatro/{id}', [AdminController::class, 'index']);
// Route::get('/phongtro', [PhongTroController::class, 'index']);
Route::middleware('fetch.nhatro')->prefix('nhatro/{id}')->group(function () {
    Route::get('/', [NhaTroController::class, 'show'])->name('nhatro.show');
    Route::get('/nhaptatcasdn', [SoDienNuocTheoPhongController::class, 'nhaptatcasdn'])->name('get.nhaptatcasdn');
    Route::post('/nhaptatcasdn', [SoDienNuocTheoPhongController::class, 'nhaptatcasdnPost'])->name('post.nhaptatcasdn');
    Route::get('/ImportSdnExcel', [SoDienNuocTheoPhongController::class, 'GetImportSdnExcel'])->name('get.ImportSdnExcel');
    Route::post('/ImportSdnExcel', [SoDienNuocTheoPhongController::class, 'PostImportSdnExcel'])->name('post.ImportSdnExcel');
    Route::get('/danhsachsdn', [SoDienNuocTheoPhongController::class, 'danhsachsdn'])->name('get.danhsachsdn');
    // Route::get('/danhsachsdn/{m}', [SoDienNuocTheoPhongController::class, 'danhsachsdn'])->name('get.danhsachsdn');
    Route::get('/TaoTatCaHoaDon', [HoaDonPhongTroController::class, 'getTatCaHoaDon'])->name('Tao.tat.ca.hoa.don');
    Route::get('/hoadonall', [HoaDonPhongTroController::class, 'listall'])->name('phong.hoadon.danhsach.all');
    Route::get('/chitiethoadonall', [HoaDonPhongTroController::class, 'chitietlistall'])->name('phong.hoadon.danhsach.chitiet.all');

    Route::prefix('tang')->group(function () {
        Route::get('/', [TangController::class, 'index'])->name('nhatro.tang.show');
        Route::get('/themtang', [TangController::class, 'create'])->name('nhatro.themtang');
        Route::post('/themtang', [TangController::class, 'store'])->name('nhatro.storetang');
        Route::get('/suatang/{id_tang}', [TangController::class, 'edit'])->name('nhatro.suatang.get');
        Route::post('/suatang/{id_tang}', [TangController::class, 'update'])->name('nhatro.suatang.post');
        Route::get('/xoatang/{id_tang}', [TangController::class, 'destroy'])->name('nhatro.xoatang');
    });
    Route::prefix('chiphi')->group(function () {
        Route::get('/', [ChiPhiDichVuController::class, 'index'])->name('nhatro.chiphi.show');
        Route::get('/themmoi', [ChiPhiDichVuController::class, 'create'])->name('nhatro.themchiphi');
        Route::post('/themmoi', [ChiPhiDichVuController::class, 'store'])->name('nhatro.storechiphi');
        Route::get('/suachiphi/{id_chiphi}', [ChiPhiDichVuController::class, 'edit'])->name('nhatro.suachiphi.get');
        Route::post('/suachiphi/{id_chiphi}', [ChiPhiDichVuController::class, 'update'])->name('nhatro.suachiphi.post');
        Route::get('/xoachiphi/{id_chiphi}', [ChiPhiDichVuController::class, 'destroy'])->name('nhatro.xoachiphi');
    });

    Route::prefix('phong')->group(function () {
        Route::get('/', [PhongTroController::class, 'index'])->name('nhatro.phong.show');
        Route::get('/{id_phong}/thongtinphong', [PhongTroController::class, 'info'])->name('nhatro.phong.show.info');
        Route::get('/themphong', [PhongTroController::class, 'create'])->name('phongtro.themphong');
        Route::post('/themphong', [PhongTroController::class, 'store'])->name('phongtro.storephong');
        
        Route::get('/suaphong/{id_phong}', [PhongTroController::class, 'edit'])->name('phongtro.suaphong.get');
        Route::post('/suaphong/{id_phong}', [PhongTroController::class, 'update'])->name('phongtro.suaphong.post');
        Route::get('/xoaphong/{id_phong}', [PhongTroController::class, 'destroy'])->name('phongtro.xoaphong');
        Route::prefix('/{id_phong}')->group(function () {
            Route::get('/muanuoc', [PhongTroController::class, 'muaNuoc'])->name('muabinhnuoc');
            Route::get('/trunuoc', [PhongTroController::class, 'truNuoc'])->name('trubinhnuoc');
            
        });

        Route::prefix('/{id_phong}/sodiennuoc')->group(function () {
            Route::get('/danhsachsodiennuoc', [SoDienNuocTheoPhongController::class, 'index'])->name('danh.sach.so.dien.nuoc');
            Route::get('/taomoisodiennuoc', [SoDienNuocTheoPhongController::class, 'firstCreate'])->name('phongtro.hoadon.sodiennuoc1');
            Route::post('/taomoisodiennuoc', [SoDienNuocTheoPhongController::class, 'postFirstCreate'])->name('phongtro.hoadon.postsodiennuoc1');
            Route::get('/create', [SoDienNuocTheoPhongController::class, 'create'])->name('sodien.nuoc.theophong.get');
            Route::post('/store', [SoDienNuocTheoPhongController::class, 'store'])->name('sodien.nuoc.theophong');
            Route::get('/edit/{id_sdn}', [SoDienNuocTheoPhongController::class, 'edit'])->name('sodien.nuoc.theophong.edit');
            Route::post('/update/{id_sdn}', [SoDienNuocTheoPhongController::class, 'update'])->name('sodien.nuoc.theophong.update');
            Route::get('/delete/{id_sdn}', [SoDienNuocTheoPhongController::class, 'delete'])->name('sodien.nuoc.theophong.delete');
        });

        Route::prefix('/{id_phong}/nguoithue')->group(function () {
            Route::get('/', [ThongTinNguoiThueController::class, 'index'])->name('phong.nguoithue.dangthue');
            Route::get('/all', [ThongTinNguoiThueController::class, 'infoall'])->name('phong.nguoithue.danhsach.all');
            Route::get('/thongtin/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'detail'])->name('nhatro.phong.nguoithue.show.1.info');
            Route::get('/themnguoi', [ThongTinNguoiThueController::class, 'create'])->name('phongtro.nguoithue.themnguoi');
            Route::post('/themnguoi', [ThongTinNguoiThueController::class, 'store'])->name('phongtro.nguoithue.storenguoi');
            Route::get('/suanguoithue/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'edit'])->name('nguoitro.suanguoi.get');
            Route::post('/suanguoithue/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'update'])->name('nguoitro.suanguoi.post');
            Route::get('/xoanguoi/{id_nguoi_thue}', [ThongTinNguoiThueController::class, 'destroy'])->name('nguoitro.xoanguoi');
        });
        
        Route::prefix('/{id_phong}/hoadon')->group(function () {
            Route::get('/', [HoaDonPhongTroController::class, 'index'])->name('nhatro.phong.hoadon.show.all.info');
            Route::get('/chonsdntheothang', [HoaDonPhongTroController::class, 'createMonth'])->name('phongtro.hoadon.chonsdntheothang');
            Route::get('/themhoadontheothang', [HoaDonPhongTroController::class, 'getcreateMonth'])->name('phongtro.hoadon.themhoadontheothang');
            Route::get('/themhoadon', [HoaDonPhongTroController::class, 'create'])->name('phongtro.hoadon.themhoadon');
            Route::post('/themhoadon', [HoaDonPhongTroController::class, 'store'])->name('phongtro.hoadon.storehoadon');
            Route::get('/detail/{id_hoadon}', [HoaDonPhongTroController::class, 'showHoaDonPhong'])->name('phongtro.hoadon.detailhoadon');
            Route::get('/suahoadon/{id_hoadon}', [HoaDonPhongTroController::class, 'edit'])->name('hoadontro.suahoadon.get');
            Route::post('/suahoadon/{id_hoadon}', [HoaDonPhongTroController::class, 'update'])->name('hoadontro.suahoadon.post');
            Route::get('/xoahoadon/{id_hoadon}', [HoaDonPhongTroController::class, 'destroy'])->name('hoadontro.xoahoadon');
        });
        Route::prefix('nguoithue/{id_nguoithue}/xe')->group(function () {
            Route::get('/', [AnhXeController::class, 'index'])->name('ngthue.xe.show');
            Route::get('/themxe', [AnhXeController::class, 'create'])->name('ngthue.themxe');
            Route::post('/themxe', [AnhXeController::class, 'store'])->name('ngthue.storexe');
            Route::get('/suaxe/{id_xe}', [AnhXeController::class, 'edit'])->name('ngthue.suaxe.get');
            Route::post('/suaxe/{id_xe}', [AnhXeController::class, 'update'])->name('ngthue.suaxe.post');
            Route::get('/xoaxe/{id_xe}', [AnhXeController::class, 'destroy'])->name('ngthue.xoaxe');
        });
    });
    
    // Định nghĩa URL để hiển thị chi tiết phòng trọ
    // Route::get('/phongtro', [AdminController::class, 'show'])->name('phongtro.show.all');
    // Route::get('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.create');
    // Route::post('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.store');
    // Route::get('/phongtro/{roomId}', [AdminController::class, 'show'])->name('nhatro.phongtro.show');
});