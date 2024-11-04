<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiPhiDichVu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tien_dien_int',
        'tien_nuoc_int',
        'tien_mang_int',
        'tien_binh_nuoc',
        'anh_qr_code',
    ];
}
