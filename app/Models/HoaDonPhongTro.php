<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonPhongTro extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_phong_tro',
        'dung_mang',
        'tien_dien_string',
        'tien_nuoc_string',
        'chi_phi_phat_sinh',
        'tien_phong_string',
        'thang',
        'thongbao',
        'tien_phong_int',
        'tien_dien_int',
        'tien_nuoc_int',
        'tien_phat_sinh',
        'so_tien_phai_tra',
        'so_tien_da_thanh_toan',
        'so_du',
        'trang_thai_thanh_toan',
    ];

    public function phongtro()
    {
        return $this->belongsTo(PhongTro::class, "id_phong_tro", "id");
    }
}
