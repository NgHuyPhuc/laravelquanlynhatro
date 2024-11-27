<?php

namespace App\Repositories\Repository;

use App\Models\NhaTro;
use App\Models\PhongTro;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Interfaces\PhongTroRepositoryInterface;

class PhongTroRepository extends BaseRepository implements PhongTroRepositoryInterface
{
    public function __construct(PhongTro $phongtro)
    {
        parent::__construct($phongtro);
    }
    public function countnguoi($id)
    {
        return PhongTro::withCount(['nguoidangthue'])->find($id);
    }
    public function traPhong($id)
    {
        return PhongTro::find($id)->traPhong();
    }
    public function resetBinhNuoc($id)
    {
        return PhongTro::where('id', $id)->update(['mua_nuoc' => 0]);
    }
    public function muaNuoc($id, $binhNuoc)
    {
        return PhongTro::where('id', $id)->update(['mua_nuoc' => $binhNuoc]);
    }
}
?>