<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiPhiDichVusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //chi phi dich vu(Gia tien dien, Gia tien nuoc, Gia tien mang, Anh Qr code) 
        Schema::create('chi_phi_dich_vus', function (Blueprint $table) {
            $table->id();
            $table->integer('tien_dien_int'); // gia dien / 1 so
            $table->integer('tien_nuoc_int'); // gia nuoc / 1 khoi
            $table->integer('tien_mang_int'); // tien mang / 1 thang
            $table->integer('tien_binh_nuoc'); // gia 1 binh nuoc
            $table->string('anh_qr_code'); // anh qr chuyen tien
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
        Schema::dropIfExists('chi_phi_dich_vus');
    }
}
