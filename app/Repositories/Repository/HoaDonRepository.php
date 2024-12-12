<?php

namespace App\Repositories\Repository;

use App\Models\HoaDonPhongTro;
use App\Models\NhaTro;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\HoaDonRepositoryInterface;
use Carbon\Carbon;

class HoaDonRepository extends BaseRepository implements HoaDonRepositoryInterface
{
    public function __construct(HoaDonPhongTro $hoadon)
    {
        parent::__construct($hoadon);
    }
    public function getByIdPhong($id_phong)
    {
        return HoaDonPhongTro::where('id_phong_tro', $id_phong);
    }
    public function getallnow($phongTros)
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        // HoaDonPhongTro::
        return HoaDonPhongTro::whereIn('id_phong_tro', $phongTros->pluck('id'))->whereYear('created_at', $year)->whereMonth('created_at', $month);
    }
}
?>