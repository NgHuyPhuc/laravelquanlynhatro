<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaTro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ten',
    ];
    public function tang(){
        return $this->hasMany(Tang::class ,"id_nha_tro","id");
    }
    public function tangdesc(){
        return $this->hasMany(Tang::class ,"id_nha_tro","id")->orderby('ten_tang_so','desc');
    }
    public function chiphidichvu()
    {
        return $this->hasOne(ChiPhiDichVu::class, 'id_nha_tro', 'id');
    }
}
