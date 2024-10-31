<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongTrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_tros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tang')->unsigned();// tầng của phòng này
            $table->foreign('id_tang')->references('id')->on('tangs');

            $table->string('ten_phong');
            $table->integer('gia_phong');
            $table->boolean('dung_mang'); // cai nay se dung de dua thong tin sang ben hoa don
            $table->string('anh_hop_dong'); 
            $table->string('so_du'); //Số dư của phòng này này
            $table->string('mo_ta'); // de viet gi do neu can
            $table->tinyInteger('trang_thai')->default(0); // mac dinh la 0 - chua duoc thue
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
        Schema::dropIfExists('phong_tros');
    }
}
