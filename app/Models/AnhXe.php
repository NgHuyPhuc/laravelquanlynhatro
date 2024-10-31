<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhXe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_nguoi_thue',
        'anh_xe',
    ];
    public function nguoithue()
    {
        return $this->belongsTo(ThongTinNguoiThue::class, "id_nguoi_thue", "id");
    }
}
