<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface SoDienNuocTheoPhongRepositoryInterface extends BaseRepositoryInterface
{
    public function countdata($id_phong);
}
?>
