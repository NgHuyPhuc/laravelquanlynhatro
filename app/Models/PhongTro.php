<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_tang',
        'ten_phong',
        'gia_phong',
        'dung_mang',
        'anh_hop_dong',
        'so_du',
        'mo_ta',
        'trang_thai',
    ];
    public function tang()
    {
        return $this->belongsTo(Tang::class, "id_tang", "id");
    }
}
