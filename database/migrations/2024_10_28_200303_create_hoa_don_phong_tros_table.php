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
        // Hoa don phong tro( ID, 
        // Phong troID, 
        // Tháng-năm
        // Dùng mạng
        // Tiền điện * giá (lưu = chữ)
        // Tiền nước * giá (lưu = chữ)
        // Tổng tiền điện (lưu = số int)
        // Tổng tiền nước ( lưu = số int)
        // Tổng tiền phải trả (lưu bằng số int) 
        // Trạng thái<true[Đã thanh toán]/ false[Chưa thanh toán]>
        // )
        Schema::create('hoa_don_phong_tros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_phong_tro')->unsigned();
            $table->foreign('id_phong_tro')->references('id')->on('phong_tros');
            $table->boolean('dung_mang'); // check xem phong co dung mang hay khong thong qua bang phong_tros
            $table->string('tien_dien_string'); // Tiền điện * giá (lưu = chữ)
            $table->string('tien_nuoc_string'); // Tiền nước * giá (lưu = chữ)
            $table->string('chi_phi_phat_sinh'); // lưu text chi phí phát sinh
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
