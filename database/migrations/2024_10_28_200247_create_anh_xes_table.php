<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhXesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //anh xe (ID, ng-thue-ID, anh)
        Schema::create('anh_xes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_nguoi_thue')->unsigned();
            $table->foreign('id_nguoi_thue')->references('id')->on('thong_tin_nguoi_thues');
            $table->string("anh_xe");
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
        Schema::dropIfExists('anh_xes');
    }
}
