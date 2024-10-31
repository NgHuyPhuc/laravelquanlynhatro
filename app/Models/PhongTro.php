<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ten_phong',
        'gia_phong',
        'trang_thai',
        'dung_mang',
        'mo_ta',
    ];
}
