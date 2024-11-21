<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinNguoiThuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //4. thong tin nguoi thue(ID, phong tro_id, ten, cmnd, que quan, xe, gioi tinh, trang thai<dang thue/ da chuyen di[ngày-tháng-năm])
        Schema::create('thong_tin_nguoi_thues', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_phong_tro')->unsigned();
            $table->foreign('id_phong_tro')->references('id')->on('phong_tros');

            $table->string('ten');
            $table->string('sdt');
            $table->string('cmnd_mat_trc');// anh cmnd_mat_trc
            $table->string('cmnd_mat_sau');// anh cmnd_mat_sau
            $table->string('que_quan');
            $table->boolean('xe'); // nguoi nay co xe hay khong
            $table->integer('gioi_tinh');//1 la nam / 2 la nu
            $table->tinyInteger('trang_thai')->default(0); //dang thue/da chuyen di
            $table->date('ngay_chuyen_toi_o'); //ngay chuyen toi o
            $table->date('ngay_chuyen_di')->nullable(); //ngay chuyen di

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
        Schema::dropIfExists('thong_tin_nguoi_thues');
    }
}
