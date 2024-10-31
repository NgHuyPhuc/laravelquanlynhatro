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
}
