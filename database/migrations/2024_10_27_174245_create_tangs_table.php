<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tangs', function (Blueprint $table) {
            $table->id(); // đây là id dùng để gộp các phòng trọ lại( in ra cho đẹp)
            
            $table->bigInteger('id_nha_tro')->unsigned();
            $table->foreign('id_nha_tro')->references('id')->on('nha_tros');

            $table->string('ten_tang'); // ten hiển thị của tầng này
            $table->integer('ten_tang_so')->unique();// dùng để lưu số thứ tự của tầng này để không phụ thuộc vào id
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
        Schema::dropIfExists('tangs');
    }
}
