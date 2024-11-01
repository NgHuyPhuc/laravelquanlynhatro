<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NhaTro\NhaTroController;
use App\Http\Controllers\PhongTro\PhongTroController;
use App\Http\Controllers\Tang\TangController;
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
Route::prefix('nhatro/{id}')->group(function () {
    Route::get('/', [NhaTroController::class, 'show'])->name('nhatro.show');

    Route::prefix('tang')->group(function () {
        Route::get('/', [TangController::class, 'index'])->name('nhatro.tang.show');
        Route::get('/themtang', [TangController::class, 'create'])->name('nhatro.themtang');
        Route::post('/themtang', [TangController::class, 'store'])->name('nhatro.storetang');
        Route::get('/suatang/{id_tang}', [TangController::class, 'edit'])->name('nhatro.suatang.get');
        Route::post('/suatang/{id_tang}', [TangController::class, 'update'])->name('nhatro.suatang.post');
        Route::get('/xoatang/{id_tang}', [TangController::class, 'destroy'])->name('nhatro.xoatang');
    });


    // Định nghĩa URL để hiển thị chi tiết phòng trọ
    Route::get('/phongtro', [AdminController::class, 'show'])->name('phongtro.show.all');
    Route::get('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.create');
    Route::post('/themmoiphongtro', [AdminController::class, 'show'])->name('phongtro.store');
    Route::get('/phongtro/{roomId}', [AdminController::class, 'show'])->name('nhatro.phongtro.show');
});