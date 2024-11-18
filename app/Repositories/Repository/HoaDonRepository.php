<?php

namespace App\Repositories\Repository;

use App\Models\HoaDonPhongTro;
use App\Models\NhaTro;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\HoaDonRepositoryInterface;

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
}
?>