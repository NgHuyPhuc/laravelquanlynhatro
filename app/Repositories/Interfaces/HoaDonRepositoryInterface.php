<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface HoaDonRepositoryInterface extends BaseRepositoryInterface
{
    public function getByIdPhong($id_phong);
}
?>
