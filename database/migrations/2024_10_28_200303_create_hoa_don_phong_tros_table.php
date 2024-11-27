<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonPhongTrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_phong_tros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_phong_tro')->unsigned();
            $table->foreign('id_phong_tro')->references('id')->on('phong_tros');
            $table->boolean('dung_mang'); // check xem phong co dung mang hay khong thong qua bang phong_tros
            $table->integer('tien_mang'); // tien mang int
            $table->string('tien_dien_string'); // Tiền điện * giá (lưu = chữ)
            $table->string('tien_nuoc_string'); // Tiền nước * giá (lưu = chữ)
            $table->string('chi_phi_phat_sinh'); // lưu text chi phí phát sinh
            $table->string('tien_phong_string'); // lưu text thong tin tien phong
            $table->string('thang'); // lưu text thang tao hoa don
            $table->string('thong_bao'); // lưu text thong bao hoa don tu thang -> thang
            $table->string('tien_binh_nuoc_string'); // lưu lại text hóa đơn tiền nước
            $table->integer('tien_binh_nuoc_int');// tổng tiền bình nước (lưu = số int)
            $table->integer('tien_phong_int');// tiền phong (lưu = số int)
            $table->integer('tien_dien_int');// Tổng tiền điện (lưu = số int)
            $table->integer('tien_nuoc_int');// Tổng tiền nước ( lưu = số int)
            $table->integer('tien_phat_sinh');// Tổng tiền điện (lưu = số int)
            $table->integer('so_tien_phai_tra'); // Tổng tiền phải trả (lưu bằng số int) 
            $table->integer('so_tien_da_thanh_toan');// Số tiền đã thanh toán của hóa đơn này
            $table->integer('so_du'); // Số dư của hóa đơn này
            $table->tinyInteger('trang_thai')->default(0); // mac dinh la 0 chua thanh toan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don_phong_tros');
    }
}
