<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tien_coc',
        'so_du',
        'mo_ta',
        'trang_thai',
    ];
    public function traPhong()
    {
        // Cập nhật trạng thái tất cả người thuê trong phòng này thành 0
        $this->nguoithue()->where('trang_thai', 1)->update([
            'trang_thai' => 0,
            'ngay_chuyen_di' => Carbon::now(),
    ]);
    }
    public function tang()
    {
        return $this->belongsTo(Tang::class, "id_tang", "id");
    }
    public function hoadon(){
        return $this->hasMany(HoaDonPhongTro::class ,"id_phong_tro","id");
    }
    public function nguoithue(){
        return $this->hasMany(ThongTinNguoiThue::class ,"id_phong_tro","id");
    }
    public function nguoidangthue(){
        return $this->nguoithue()->where('trang_thai', 1);
    }
    public function sodiennuoc(){
        return $this->hasMany(SoDienNuocTheoPhong::class ,"id_phong_tro","id");
    }
    public function getLastestSdn(){
        return $this->sodiennuoc()->orderBy('date', 'desc')->take(1)->first();
    }
    public function getSecondSdn(){
        return $this->sodiennuoc()->orderBy('date', 'desc')->skip(1)->take(1)->first();
    }
    public function getSdnByMonthYear($year, $month){
        $data = $this->sodiennuoc()->whereYear('date', $year)->whereMonth('date', $month);
        if ($data->get()->isEmpty()) {
            return collect();
        }
        return $data;
    }
}
