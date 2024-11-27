<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface PhongTroRepositoryInterface extends BaseRepositoryInterface
{
    public function countnguoi($id);
    public function traPhong($id);
    public function resetBinhNuoc($id);
    public function muaNuoc($id, $binhNuoc);
}
?>
