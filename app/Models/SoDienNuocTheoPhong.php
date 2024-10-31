<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoDienNuocTheoPhong extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_phong_tro',
        'date',
        'so_dien',
        'so_nuoc',
    ];
    public function phongtro()
    {
        return $this->belongsTo(PhongTro::class, "id_phong_tro", "id");
    }
}
