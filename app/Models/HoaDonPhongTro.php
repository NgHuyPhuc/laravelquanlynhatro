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
        'tien_dien_int',
        'tien_nuoc_int',
        'so_tien_phai_tra',
        'trang_thai_thanh_toan',
    ];

    public function phongtro()
    {
        return $this->belongsTo(PhongTro::class, "id_phong_tro", "id");
    }
}
