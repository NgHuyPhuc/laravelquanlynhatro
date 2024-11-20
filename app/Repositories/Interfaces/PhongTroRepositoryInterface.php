<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface PhongTroRepositoryInterface extends BaseRepositoryInterface
{
    public function countnguoi($id);
    public function traPhong($id);
}
?>
