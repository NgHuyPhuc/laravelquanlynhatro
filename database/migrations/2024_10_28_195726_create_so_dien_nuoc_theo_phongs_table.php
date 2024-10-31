<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoDienNuocTheoPhongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //SoDienNuocTheoPhong(ID, phong_tro_id, Thang-nam, so dien, so nuoc)
        Schema::create('so_dien_nuoc_theo_phongs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_phong_tro')->unsigned();
            $table->foreign('id_phong_tro')->references('id')->on('phong_tros');
            $table->date('date');
            $table->integer('so_dien');
            $table->integer('so_nuoc');
            
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
        Schema::dropIfExists('so_dien_nuoc_theo_phongs');
    }
}
