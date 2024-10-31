<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinNguoiThue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_phong_tro',
        'ten',
        'sdt',
        'cmnd',
        'que_quan',
        'xe',
        'gioi_tinh',
        'trang_thai',
        'ngay_chuyen_toi_o',
        'ngay_chuyen_di',
    ];

    // $table->id();

    //         $table->bigInteger('id_phong_tro')->unsigned();
    //         $table->foreign('id_phong_tro')->references('id')->on('phong_tros');

    //         $table->string('ten');
    //         $table->string('sdt');
    //         $table->string('cmnd');// anh
    //         $table->string('que_quan');
    //         $table->boolean('xe'); // nguoi nay co xe hay khong
    //         $table->integer('gioi_tinh');//1 la nam / 2 la nu
    //         $table->boolean('trang_thai'); //dang thue/da chuyen di
    //         $table->date('ngay_chuyen_toi_o'); //ngay chuyen di
    //         $table->date('ngay_chuyen_di'); //ngay chuyen di
}
